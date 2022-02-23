<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="online_offline.css">
</head>
<div class="first">
<body>
    <h2>ONLINE USERS ARE </h2>
</body>
<span class="dot">
</html>

<?php      
    include('conn.php');  
    $one=1;
    // echo "ONLINE USERS ARE :";
        $sql = "select name from user_information WHERE isonline='$one'";  
        $result = mysqli_query($conn, $sql);  
        $num = mysqli_num_rows($result);
        // echo $num;
        while($row = mysqli_fetch_assoc($result)){
          echo $row['name'];
          echo "<br>";
      }
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    </div>
    </span>
    <div class="second">
<body>
    <h2>ALL USERS ARE </h2>
</body>
</html>
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