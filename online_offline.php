
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="online_offline.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<div class="first">
<body>
    <h2>ONLINE USERS ARE </h2>
    <!-- <script>
		function updateUserStatus(){
			jQuery.ajax({
				url:'online_offline.php',
				success:function(){
					
				}
			});
		}
		
		function getUserStatus(){
			jQuery.ajax({
				url:'online_offline.php',
				success:function(result){
					jQuery('#user_grid').html(result);
				}
			});
		}
		
		setInterval(function(){
			updateUserStatus();
		},3000);
		
		setInterval(function(){
			getUserStatus();
		},10000);
	  </script> -->
</body>
<span class="dot">
</html>

<?php    
session_start();  
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
    //   if(time() - $_SESSION['timestamp'] > 900) { //subtract new timestamp from the old one
    //     echo"<script>alert('15 Minutes over!');</script>";
    //     unset($_SESSION['uname'], $_SESSION['password'], $_SESSION['timestamp']);
    //     $_SESSION['logged_in'] = false;
    //     header("Location: login.html"); //redirect to index.php
    //     exit;
    // } else {
    //     $_SESSION['timestamp'] = time(); //set new timestamp
    // }
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
    </div>
    </span>
    <div class="second">
<body>
    <h2>ALL USERS ARE </h2>
    <!-- <script>
		function updateUserStatus(){
			jQuery.ajax({
				url:'online_offline.php',
				success:function(){
					
				}
			});
		}
		
		function getUserStatus(){
			jQuery.ajax({
				url:'online_offline.php',
				success:function(result){
					jQuery('#user_grid').html(result);
				}
			});
		}
		
		setInterval(function(){
			updateUserStatus();
		},3000);
		
		setInterval(function(){
			getUserStatus();
		},10000);
	  </script> -->
</body>
</html>
<?php    
session_start();  
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