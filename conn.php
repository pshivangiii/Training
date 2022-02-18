<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '#Shivangi21';  
    $db_name = "game";  
      
    $conn = mysqli_connect($host, $user, $password, $db_name);  
    
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
    // else{
    //    echo "CONNECTED ";
    // }
?>