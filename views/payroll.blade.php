<!-- LOGIN PAGE -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAYROLL</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <h2> ENTER EMAIL TO CONTINUE TO PAYROLL PORTAL </h2>
    <form class ="row g-3" action="{{url('/')}}/payroll" method="POST">
        {{ csrf_field() }}
       
        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" pattern="[^ @]*@[^ @]*" placeholder="Enter Username" name="uname" required>
      
    
          <a href='/payroll_details'><button type="submit">Continue </button></a>
        
        </div>
       </form>
       
</body>
</html> 
