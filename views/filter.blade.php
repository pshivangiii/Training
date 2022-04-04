<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>USER DETAILS</title>
</head>
<body>
 <form class ="row g-3" action="{{url('/')}}/filter" method="POST">
        {{ csrf_field() }}

    <h3>SEARCH</H3>
        
        <label for="Search"><b>Search</b></label>
          
        <select name="search" id="search">
       
        <option value="Name">Name</option>
        <option value="Designation">Designation</option>
        <option value="Team">Team</option>
        <option value="Attendance Requests">Attendance Requests</option>
        </select>
       <br><br>
       {{-- <label for="text"><b>Enter Text To Search </b></label><br>
        <input type="text"  placeholder="Enter text" name="text" id="text" ><br> --}}

        <label for="text"><b>Enter Text</b></label>
        <input type="text" placeholder="Enter Text To Search" name="text" id="text" >
        <br>
        @foreach ($users as $user)
        <button id = "btn" ><a href = 'filterview/{{ $user->email}}'>GO</a></button>
        @break
        @endforeach

    
</form>

</body>
</html>