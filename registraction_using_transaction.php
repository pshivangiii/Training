<html>
    <body>
     <?php      
        include('conn.php');  
        $email=$_POST["email"];
        if (empty($_POST["email"])) {
          $emailErr = "Email is required";
           } 
           else {
        $email = test_input($_POST["email"]);
       
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
      $sql = "select id from user_information where name = '$email'";  
      $result = mysqli_query($conn, $sql); 
      $num = mysqli_num_rows($result);
      // echo $num;
      try{
      if($num > 0)
      {
        echo "Email already registered!!!";
      }
      else{
    
         $valpass=$_POST["psw"];
         $valpass2=$_POST["psw-repeat"];
         if($valpass != $valpass2)
         {
             echo "Passwords mismatched";
         }
    
         else{
        
          $conn->begin_transaction();
        
         $sql = "INSERT INTO user_information (name,password)
                  VALUES ('$email','$valpass')";
                  $conn->commit();
            }
                  if ($conn->query($sql) === TRUE) {
                    header("Location: login.html");
                    $conn->close();
                  } else {
                    echo " ";
                  }
                }
              }
              catch (mysqli_sql_exception $exception) {
                $conn->rollback();
                echo "here";
                throw $exception;
            }
              
        function test_input($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
       
?>
    </body>
</html>