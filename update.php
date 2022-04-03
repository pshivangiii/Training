<!DOCTYPE html>
<html>
<head>
<title>Employee Details | Edit</title>
</head>
<body>
<form action = "/edit/<?php echo $users[0]->id; ?>" method = "post">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<table>
<tr>
<td>Email</td>
<td>
<input type = 'text' name = 'email'
value = '<?php echo$users[0]->email; ?>'/> </td>
</tr>
<tr>
<td>Password</td>
<td>
<input type = 'text' name = 'psw'
value = '<?php echo$users[0]->password; ?>'/> </td>
</tr>
<tr>
<td>Team</td>
<td>
<input type = 'text' name = 'team'
value = '<?php echo$users[0]->team; ?>'/>
</td>
</tr>
<tr>
<td>Designation</td>
<td>
<input type = 'text' name = 'designation'
value = '<?php echo$users[0]->designation; ?>'/>
</td>
</tr>
<tr>

</tr>
<tr>
<td colspan = '2'>
<input type = 'submit' value = "Update Details" />
</td>
</tr>
</table>
</form>
</body>
</html>