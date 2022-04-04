<!-- LOGIN PAGE -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN-LOGIN</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body style="text-align:center;">  
    <h1>ADMIN LOGIN </h1>
    <form class ="row g-3" action="{{url('/')}}/adminlogin" method="POST">
        {{ csrf_field() }}
       
        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" pattern="[^ @]*@[^ @]*" placeholder="Enter Username" name="uname" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
          <button type="submit">Login </button>
         
         
          <!-- <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label> -->
        </div>
      
        
       </form>
       <img src="https://i0.wp.com/ednep.com/wp-content/uploads/2020/06/Employee-Management-System.png?w=810&ssl=1" alt=" "  width="1000" height="400">
</body>
</html> 
<!-- THIS PAGE WILL FURTHER CONNECT TO THE GAME -->