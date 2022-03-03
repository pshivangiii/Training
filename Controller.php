<?php
require_once('models/user_information.php');
class Controller{
    public $model;
    public function __construct(){
        $this->models=new User();

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