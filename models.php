<?php
require_once('models/conn.php');
require_once('models/models.php');
class Model{
    
    public function getlogin(){
        if(isset($_REQUEST['uname']) && isset($_REQUEST['psw']))
        {
            
            if($_REQUEST['uname'] == 'abc@gmail.com' && $_REQUEST['psw'] == '12')
            {
                return 'login';
            }
            else
            {
                return 'Invalid attempt';
            }
        }
    }
}
?>