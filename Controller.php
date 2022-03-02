<?php
require_once('model/model_login');
class Controller{
    public $model;
    public function _construct(){
        $this->models=new Model();

    }
    public function invoke(){
       $result= $this->models->getlogin();
       if($result == 'login'){
           include 'views/afterlogin.html';
       }
       else{
        include 'views/login.html';
       }
    }
}
?>