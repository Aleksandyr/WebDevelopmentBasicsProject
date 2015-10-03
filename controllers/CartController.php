<?php

class CartController extends BaseController
{
    private $db;

    public function onInit(){
        $this->title = "Cart";
        $this->db = new CartModel();
    }

    public function index(){
        $this->authorize();

        $currUser = $this->db->getUser($_SESSION['username'])[0];
        $this->currUser = $currUser;

        $this->productsCart = $this->db->getAllProductsByUser($currUser[0]);

        $this->renderView();
    }

    public function add($userId, $categoryId, $productId){
        $productMoney = (double)$this->db->getCurrProductMoney($productId)[0];
        $userMoney = (int)$this->db->getUser($_SESSION['username'])[0][1];

        if(!$this->isHaveMoney($userMoney, $productMoney)){
            $this->addErrorMessage("You don't have enough money");
            return $this->redirect('products');
        }

        $isHaveProducts = $this->db->checkQuantityByProduct($productId);
        if($isHaveProducts[0] <= 0){
            $this->addErrorMessage("We don't have products anymore");
            return $this->redirect('products');
        }

        $isTheSameProduct = $this->db->checkForSameProductInCart($categoryId, $productId);
        $getCartId = $this->db->checkForSameProductInCart($categoryId, $productId)[0][0];
        if(count($isTheSameProduct) > 0){
            $this->db->IncreaseQuantityForCurrProductCart($getCartId);
            $this->db->decreaseQuantityForCurrProduct($productId);
            $this->db->decreaseUserMoney($productMoney, $userId);
            $_SESSION['cash'] = $userMoney;
            return $this->redirect('products');
        } else{
            $this->db->decreaseQuantityForCurrProduct($productId);
        }

        $this->db->decreaseUserMoney($productMoney, $userId);

        $this->db->add($userId, $categoryId, $productId);

        $this->redirect('products', 'index');

        $this->renderView(__FUNCTION__);
    }

    public function delete($categoryId, $productId, $cartQuantity){
        $productMoney = (double)$this->db->getCurrProductMoney($productId)[0];
        $userMoney = (int)$this->db->getUser($_SESSION['username'])[0][1];
        $userId = $this->db->getUser($_SESSION['username'])[0][0];

        $this->db->increaseUserMoney($productMoney, $userId);

        $this->db->decreaseQuantityFromCart($categoryId, $productId);
        $this->db->IncreaseQuantityForCurrProduct($productId);
        $getCartId = $this->db->checkForSameProductInCart($categoryId, $productId)[0][0];

        if($cartQuantity <= 1){
            $this->db->deleteFromCart($getCartId);
        }

        $this->redirect('cart');

        $this->renderView(__FUNCTION__);
    }

    private function isHaveMoney($userMoney, $productMoney){
        if($userMoney < $productMoney){
            return false;
        }
        return true;
    }

}