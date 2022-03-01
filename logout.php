<?php
   session_start();
   include('conn.php');  
    // $username = $_POST['uname'];  
    $username = $_SESSION['uname'];  
    $one=1;
    $zero=0;
    setcookie("user", "", time() - 3600); 
        // echo $user;
        $username = stripcslashes($username);  
        $username = mysqli_real_escape_string($conn, $username);  
       
            $s="UPDATE user_information SET isonline='$zero' WHERE name='$username'";
            $r = mysqli_query($conn, $s); 
            session_unset(); 
            session_destroy();
            header("Location: login.html");
            $conn->close();
            exit;
            // if(isset($_SESSION) == FALSE)
            //  {
	        //     header("Location: login.html");
            //   }
    ?>
© 2022 GitHub, Inc.
Terms