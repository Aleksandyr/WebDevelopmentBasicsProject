<?php

class AdminController extends  BaseController
{
    private $db;
    private $dbCategory;
    private $dbProduct;

    public function onInit(){
        $this->title = "Admin";
        $this->db = new AdminModel();
        $this->dbCategory = new CategoriesModel();
        $this->dbProduct = new ProductsModel();
    }

    public function index(){
        $this->authorize();

        $this->categories = $this->dbCategory->getAllCategories();

        $this->products = $this->dbProduct->getAllProducts();

        $this->renderView();
    }

    public function addProduct(){
        if($this->isPost()) {
            $name = $_POST['nameProduct'];
            $description = $_POST['description'];
            $price = (double)$_POST['price'];
            $quantity = (int)$_POST['quantity'];

            if(is_null($name) || empty($name)){
                $this->addErrorMessage("Set product name!");
                return $this->redirect('admin', 'addProduct');
            } else if(is_null($description) || empty($description)) {
                $this->addErrorMessage("Set description!");
                return $this->redirect('admin', 'addProduct');
            } else if(is_null($price) || empty($price)) {
                $this->addErrorMessage("Set price!");
                return $this->redirect('admin', 'addProduct');
            } else if(is_null($quantity) || empty($quantity)) {
                $this->addErrorMessage("Set quantity!");
                return $this->redirect('admin', 'addProduct');
            }

            $this->db->addProduct($name, $description, $price, $quantity);
            $this->addInfoMessage("You successful add product!");
            return $this->redirect('admin', 'addProduct');
        }
        $this->renderView(__FUNCTION__);
    }

    public function addProductInCategory(){
        $this->categories = $this->dbCategory->getAllCategories();
        $this->products = $this->dbProduct->getAllProducts();

        if($this->isPost()){
            $productId = $_POST['product_num'];
            $categoryId = $_POST['category_num'];

            $product = $this->db->getCurrProduct($productId)[0];
            $category = $this->db->getCurrCategory($categoryId)[0];
            $isHaveProductInCurrCategory = $this->db->getProductInCurrCategory($productId, $categoryId)[0];

            if($product == null){
                $this->addErrorMessage("This product isn't exist!");
                return $this->redirect('admin');
            } else  if($category == null){
                $this->addErrorMessage("This category isn't exist!");
                return $this->redirect('admin');
            } else if($isHaveProductInCurrCategory != null){
                $this->addErrorMessage("This product already exist in category!");
                return $this->redirect('admin');
            }

            $this->db->addProductInCategory($productId, $categoryId);
            $this->addInfoMessage("You successful add product!");
            $this->redirect('admin');
            $this->renderView(__FUNCTION__);
        }
    }
}