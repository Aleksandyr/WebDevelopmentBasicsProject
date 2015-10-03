<?php

class CategoriesController extends BaseController
{
    private $db;

    public function onInit(){
        $this->title = "Category";
        $this->db = new CategoriesModel();
    }

    public function index(){
        $this->authorize();

        $this->categories = $this->db->getAllCategories();

        $this->renderView();
    }

}