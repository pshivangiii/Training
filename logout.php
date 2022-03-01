<?php
   session_start();
   include('conn.php');  
    
    $username = $_SESSION['uname'];  
    $one=1;
    $zero=0;
        
        $username = stripcslashes($username);  
        $username = mysqli_real_escape_string($conn, $username);  
       
            $s="UPDATE user_information SET isonline='$zero' WHERE name='$username'";
            $r = mysqli_query($conn, $s); 
            if($r)
            {
                setcookie("user", "", time() - 3600); 
                header("Location: login.html");
            }
            session_unset(); 
            session_destroy();
            header("Location: login.html");
            $conn->close();
            exit;
            
    ?>
