<?php      
    include('conn.php');  
        $sql = "select name from user_information";  
        $result = mysqli_query($conn, $sql);  
        $num = mysqli_num_rows($result);
        // echo $num;
        while($row = mysqli_fetch_assoc($result)){
          echo $row['name'];
          echo "<br>";
      }
     ?>