

<table width="100%" cellpadding="3">
	<tr>
		<td><h3>Welcome</h3></td>
	</tr>
	<tr>
		<td><a href="index.php"><strong>Home</strong></a></td>
	</tr>
	
<?php 
	if (! isset($_SESSION['valid_recipe_user'])){
		echo "<tr>";
		echo "<td><a href=\"index.php?content=login\"><strong>Login</strong></a></td>";
		echo "</tr>";
	}
	else{
		echo "<tr>";
		echo "<td><a href=\"index.php?content=logout\"><strong>Logout</strong></a></td>";
		echo "</tr>";
	}
?>	
	
	<tr>
		<td><a href="index.php?content=register"><strong>Register</strong></a></td>
	</tr>

	<tr>
		<td><a href="index.php?content=newrecipe"><strong>Share Recipe</strong></a></td>
	</tr>
	<tr>
		<td><hr size="0" noshade="noshade" /></td>
	</tr>
	<tr>
		<td>
			<form action="index.php" method="get">
					<input name="searchFor" type="text" size="16" color = "grey" value = "Search for Recipe" onclick="this.value='';"/><br>
					<div align = "left"><input name="goButton" type="submit" value="Search" /></div>
					<input name="content" type="hidden" value="search" />
			 </form>  
		</td>
	</tr>
</table>