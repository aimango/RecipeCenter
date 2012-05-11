<h1>Registration Form</h1>
<p>Register at Recipe Center to share your recipes and comment on other recipes!</p><br>
<h3>Please enter the following information (* indicates required fields):</h3><br>
<form action="index.php" method="post" target="_self">
	<b>Username: *</b><br><input type="text" name="userid"><br>
	<br />
	<b>Password: *</b><br><input type="password" name="password"><br>
	<br />
	<b>Confirm Password: *</b><br />
	<input type="password" name="password2"><br>
	<br />
	<b>Name:</b><br />
	<input type="text" size = "40" name="fullname"><br>
	<br />
	<b>E-mail:</b><br><input type="text" size="50" name="email">
	
	<br><br><input type ="submit" value="Register">
	<p><i><b>Note: </b>Email addresses are kept confidential.</i></p>
	<input type="hidden" name="content" value="adduser">
	<br><br><hr size="1" noshade="noshade">
</form>