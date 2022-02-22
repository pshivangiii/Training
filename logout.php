<?php
   session_start();
    include('conn.php');  
    // $username = $_POST['uname'];  
    $user = $_SESSION['uname'];  
    $one=1;
    $zero=0;
      
        echo $user;
        $username = stripcslashes($username);  
       
        $username = mysqli_real_escape_string($conn, $username);  
       
            $s="UPDATE user_information SET isonline='$zero' WHERE name='$user'";
            $r = mysqli_query($conn, $s);  
            session_destroy();
            header("Location: login.html");
                    $conn->close();
    ?>
