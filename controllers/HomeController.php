<?php

class HomeController extends BaseController {
    private $db;

    public function onInit(){
        $this->title = "Home";
        $this->db = new HomeModel();

        if($this->isLoggedIn()) {
            $currUser = $this->db->getUser($_SESSION['username'])[0];
            $this->currUser = $currUser;
        }
    }

    public function index() {


        $this->renderView();
    }
}