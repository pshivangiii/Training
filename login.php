<?php      
    include('conn.php');  
    $username = $_POST['uname'];  
    $password = $_POST['psw'];  
      
      
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select *from user_information where name = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
       
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            header("Location: rps.html");
                    $conn->close();
        }  
        else{  
            echo "Invalid username or password.";  
        }     
?>  