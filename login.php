<?php      
    include('conn.php');  
    $username = $_POST['uname'];  
    $password = $_POST['psw'];  
    $one=1;
    $zero=0;
      
      
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select *from user_information where name = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
       
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            $s="UPDATE user_information SET isonline='$one' WHERE name='$username'";
            $r = mysqli_query($conn, $s);  
            header("Location: rps.html");
                    $conn->close();
        }  
        else{  
            echo "Invalid username or password.";  
        }     
?>  