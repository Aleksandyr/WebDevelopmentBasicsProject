<?php

class AdminController extends  BaseController
{
    private $db;

    public function onInit(){
        $this->title = "Admin";
        $this->db = new AdminModel();
    }

    public function index(){
        $this->authorize();

        $this->renderView();
    }
}