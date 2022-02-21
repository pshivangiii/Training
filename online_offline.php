<?php      
    include('conn.php');  
    $one=1;
        $sql = "select name from user_information WHERE isonline='$one'";  
        $result = mysqli_query($conn, $sql);  
        $num = mysqli_num_rows($result);
        // echo $num;
        while($row = mysqli_fetch_assoc($result)){
          echo $row['name'];
          echo "<br>";
      }
     ?>