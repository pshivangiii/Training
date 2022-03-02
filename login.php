<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div class="a">
    
</body>
</html>
<?php      
session_start();
    include('conn.php');  
    $username = $_POST['uname'];  
    $password = $_POST['psw'];  
    $one=1;
    $zero=0;
    $_SESSION['loggedin']="false";
      
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
        $_SESSION['uname']= $username;
      
        $sql = "select *from user_information where name = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
       
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            $_SESSION['loggedin']="true";
            $cookie_name = "user";
            $cookie_value = "login";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            $s="UPDATE user_information SET isonline='$one' WHERE name='$username'";
            $r = mysqli_query($conn, $s);  
            header("Location: rps.html");
                    $conn->close();
        }  
        else{  
            echo "Invalid username or password.";  
        }  
       
?>  
