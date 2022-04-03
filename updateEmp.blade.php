<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <h2> EDIT RECORDS </h2>
    <br>
    <table class="table table-bordered table-striped">
        <thead>
<tr>
<td>ID</td>
<td>Email</td>
<td>Team</td>
<td>Designation</td>

<td>Edit</td>
</tr>
@foreach ($users as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->team}}</td>
<td>{{ $user->designation}}</td>

<td><a href = 'edit/{{ $user->id }}'>Edit</a></td>
</tr>
@endforeach
</table>
<p>{{ $users->links() }}</p>
</body>
</html>