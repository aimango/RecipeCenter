<?php
	
	if (isset($_SESSION['valid_recipe_user'])){
	   $user = $_SESSION['valid_recipe_user'];
	   echo "<h2>$user, You are now logged out. </h2>\n";
	   unset($_SESSION['valid_recipe_user']);
	}
	else{
	 echo "<br><h2>Whops! It seems that you are not logged in.</h2>";
	}
?>
<br><hr size="1" noshade="noshade">