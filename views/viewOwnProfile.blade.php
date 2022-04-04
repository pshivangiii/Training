<!Doctype html>
<html>
<head>
<title>View Own Profile</title>
</head>
<body>
<h1 style="color :rgb(103, 39, 146); "><u> Profile Details </u></h1>
{{-- <form class ="row g-3" action="{{url('/')}}/ownprofile" method="POST">
    {{ csrf_field() }} --}}
    <table class="table table-bordered table-striped">
        
    @foreach($users as $key => $data)
    <tr style="background-color:#d6e69d;">
<td>Email</td>
<td>{{ $data->email}}</td>
</tr>
<tr style="background-color:#aabcee;">
 <td>Team</td>
 <td>{{ $data->team }}</td>
</tr>
<tr style="background-color:#ca9497;">
    <td>Designation</td>
    <td>{{ $data->designation }}</td>
   </tr>
   <tr style="background-color:#9d8af1;">
    <td>EDIT</td>
    <td><a href = '/ownprofile/own/{{ $data->id}}'>Edit</a></td>
   </tr>

</table>

</form>
@endforeach
<style>
    table {
  border-collapse: collapse;
  width: 60%;
  
}
</style>
</body>
</html>