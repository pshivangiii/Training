<!-- LOGIN PAGE -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    @push('styles')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    @endpush
</head>
<body style="text-align:center;">  
  
    <h1> LOGIN </h1>
    <form class ="row g-3" action="{{url('/')}}/newlogin" method="POST">
        {{ csrf_field() }}
       
        <div class="container">
          <label for="email"><b>Email</b></label>
          <input type="text" pattern="[^ @]*@[^ @]*" placeholder="Enter email" name="email" required>
      
          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
          <a href='/employee_details'><button type="submit">Login </button></a>
          {{-- <a href = '/employee_details/{{ }}'>LOGIN</a> --}}
         
          <!-- <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label> -->
        </div>
      
        {{-- <div class="container" style="background-color:#f1f1f1">
          <button type="button" class="editbtn"><a href="edit.html">Change Password</a></button>
          <!-- <span class="psw">Forgot <a href="edit.html">password?</a></span> -->
        </div> --}}
        
       </form>
       
        <img src="https://i0.wp.com/ednep.com/wp-content/uploads/2020/06/Employee-Management-System.png?w=810&ssl=1" alt=" "  width="1000" height="400">
      
</body>
</html> 
