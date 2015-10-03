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

        $userId = $this->db->getUser($_SESSION['username'])[0];
        $this->userId = $userId;
        $this->productsCart = $this->db->getAllProductsByUser($userId[0]);

        $this->renderView();
    }

    public function add($userId, $categoryId, $productId){
        $isHaveProducts = $this->db->checkQuantityByProduct($productId);
        if($isHaveProducts[0] <= 0){
            $this->addErrorMessage("We don't have products anymore");
            return $this->redirect('products');
        }

        $this->db->decreaseQuantityFromCurrProduct($productId);

        $this->db->add($userId, $categoryId, $productId);

        $this->redirect('products', 'index');

        $this->renderView(__FUNCTION__);
    }


}