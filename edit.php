<?php      
    include('conn.php');  
    $username = $_POST['uname'];  
    $password = $_POST['psw'];  
      
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "UPDATE user_information SET password = '$password' WHERE name = '$username'";  
          
        if($conn->query($sql) == TRUE){  
            header("Location: rps.html");
                    $conn->close();
        }  
        else{  
            echo "Invalid username or password.";  
        }     
?>  




<html>
    <body>
     <!-- <?php      
    //  include('conn.php');  
    //  session_start();
    //       $uname=$_POST["uname"];
    //       $valpass=$_POST["psw"];
    //       $sql = "UPDATE user_information SET password = $valpass WHERE name = $uname";
    //       if($conn->query($sql))
    //       {
    //         echo "Invalid email or password";
    //       }   
    //       else{
    //         $sql = "INSERT INTO user_information (uname,password)
    //         VALUES ('$uname','$valpass')";
    //       }
          
    //       header("Location: rps.html");
    //                $conn->close();
?> -->
    </body>
</html>

