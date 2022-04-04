<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body>
    <form class ="row g-3" action="{{url('/')}}/edit" method="POST">
        {{ csrf_field() }}
        {{-- {{ method_field('PATCH') }} --}}

        <table class="table table-bordered table-striped">
            <thead>
<tr>
{{-- <td>ID</td> --}}
<td>Email</td>
<td>Team</td>
<td>Designation</td>

</tr>
{{-- @foreach ($user as $user) --}}
@foreach($user as $key => $data)
<tr>
{{-- <td>{{ $data->id }}</td> --}}
<td>{{ $data->email}}</td>
<td>{{ $data->team }}</td>
<td>{{ $data->designation }}</td>


<td><a href = '/click/{{ $data->id }}'>EDIT</a></td>
 
</tr>
@endforeach
</table>
</form>
</body>
</html>
