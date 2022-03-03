<?php
require_once('models/user_information.php');
class User{
    public function getlogin()
    {
    $host = "localhost";  
    $user = "root";  
    $password = "";  
    $db_name = "game";  
      
    $conn = mysqli_connect($host, $user, $password,$db_name);  
    
    if(!$conn) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
    //  else{
    //     echo "CONNECTED ";
    //  }

    
     if(isset($_REQUEST['uname']) && isset($_REQUEST['psw']))
     {
         $name=$_REQUEST['uname'];
         $password=$_REQUEST['psw'];
         $sql = "select *from user_information where name = '$name' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
       
        $count = mysqli_num_rows($result);  
         
        //  if($_REQUEST['uname'] == '$username' && $_REQUEST['psw'] == '$password')
        //  {
            if($count == 1){
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