<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>USER DETAILS</title>
</head>
<body>
    <form class ="row g-3" action="{{url('/')}}/team_details" method="POST">
        {{ csrf_field() }}

    <h1>USER DETAILS</H1>
        @foreach($user as $key => $data)
    <tr>
       
      
      <p style="background-image: url('https://th.bing.com/th/id/OIP.JwwHD3XLH7sUeTDFDjxJAQHaEK?w=309&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7');">
      <button type="submit" class="btn" id="email"><th>{{$data->email}}</th></button>
  
      <th>{{$data->team}}</th>
      <th>{{$data->designation}}</th><br><br>
      {{-- <td><a href = '/show/{{ $data->id }}'>Delete</a></td>
      <td><a href = '/click/{{ $data->id }}'>EDIT</a></td> --}}
     
      

      <br>
              
    </tr>

@endforeach
</form>
</body>
</html>