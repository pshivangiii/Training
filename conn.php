<?php      
    $host = "localhost";  
    $user = "root";  
    $password = "";  
    $db_name = "game";  
      
    $conn = mysqli_connect($host, $user, $password,$db_name);  
    
    if(!$conn) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
//     else{
//        echo "CONNECTED ";
//     }
// ?>