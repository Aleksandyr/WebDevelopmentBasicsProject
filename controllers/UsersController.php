<?php

class UsersController extends BaseController{
    private $db;

    public function onInit(){
        $this->title = "Users";
        $this->db = new UsersModel();
    }

    public function index(){
        $this->isAdmin();
        $this->authorize();

        $this->allUsers = $this->db->getAllUsers();

        $this->renderView();
    }


    public function setUserRole($id){
        if($this->isAdmin()){
            if($this->isPost()) {
                $isAdmin = $_POST['isAdmin'];
                $isEditor = $_POST['isEditor'];
                var_dump($isAdmin);
                var_dump($isEditor);
                if((empty($isAdmin) || $isAdmin == null) && (empty($isEditor) || $isEditor == null)){
                    $this->addErrorMessage('Chose one filed!');
                    return $this->redirect('users');
                } if((!empty($isAdmin) || !$isAdmin == null) && (!empty($isEditor) || !$isEditor == null)){
                    $this->addErrorMessage('You should chose only one field!');
                    return $this->redirect('users');
                }

                if((empty($isAdmin) || $isAdmin == null)){
                    $this->db->setUserToBeEditor($id);
                    $this->addInfoMessage('You successful set user to be editor!');
                    return $this->redirect('users');
                }

                if((empty($isEditor) || $isEditor == null)){
                    $this->db->setUserToBeAdmin($id);
                    $this->addInfoMessage('You successful set user to be admin!');
                    return $this->redirect('users');
                }
            }
            $this->redirect('users');
        }
    }
}