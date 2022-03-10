<?php      
    include('conn.php');  
    $username = $_POST['uname'];  
    $password = $_POST['psw'];  
   
      
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
        $conn->begin_transaction();
        try{
        $sql = "UPDATE user_information SET password = '$password' WHERE name = '$username'";  
        $conn->commit();
        }
        catch (mysqli_sql_exception $exception) {
            $conn->rollback();
            echo "here";
            throw $exception;
          }  
        if($conn->query($sql) == TRUE){  
            header("Location: rps.html");
                    $conn->close();
        }  
        else{  
            echo "Invalid username or password.";  
        }     
?>  