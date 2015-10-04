<?php

class CategoriesController extends BaseController
{
    private $db;

    public function onInit(){
        $this->title = "Category";
        $this->db = new CategoriesModel();

        if($this->isLoggedIn()) {
            $currUser = $this->db->getUser($_SESSION['username'])[0];
            $this->currUser = $currUser;
        }
    }

    public function index(){
        $this->authorize();

        $this->categories = $this->db->getAllCategories();

        $this->renderView();
    }

    public function addProduct(){
        $this->redirect('admin');
    }

}