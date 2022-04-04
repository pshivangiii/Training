<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATTENDANCE PORTAL</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    {{-- <h2> ATTENDANCE PORTAL</h2> --}}
    <form class ="row g-3" action="{{url('/')}}/attendance" method="POST">
        {{ csrf_field() }}
          {{-- <button id="att" type="submit">Attendance </button> --}}
          <p>WELCOME TO ATTENDANCE PORTAL</p><br>
          <p>To apply attendance 
          <button id = 'att'><a href = '/calendar'>CLICK HERE</a></button></p>
          <button id = 'att'><a href = '/att'>Check Your Attendance</a></button>
          
       </form>
</body>
</html> 
