<?php
	if (!isset($_SESSION['valid_recipe_user'])){
?>
   <h2>Sorry, you do not have permission to post recipes! :(</h2>
   <a href="index.php?content=login">Please login to post recipes.</a>
<?php
	} else{
	   $userid = $_SESSION['valid_recipe_user'];
	?>
	   <form action="index.php" method="post">
		   <h1>Share your Recipe:</h1><br>
		   <h3>Title:</h3><input type="text" size="40" name="title"><br>
		   <br><h3>Short Description:</h3><br><textarea rows="5" cols="50" name="shortdesc"></textarea><br>
		   <br><h3>Ingredients (one item per line)</h3>
		   <textarea rows="10" cols="50" name="ingredients"></textarea><br>
		   <br><h3>Directions</h3>
		   <textarea rows="10" cols="50" name="directions"></textarea><br>
		   <br><input type="submit" value="Submit">

		   <input type="hidden" name="poster" value="<?php echo $userid; ?>"><br>
		   <input type="hidden" name="content" value="addrecipe">
	   </form>
	<?php
	}
?>
<br>
<hr size="1" noshade="noshade">

<!-- we will use POST since there is larger amounts of content.
addrecipe.inc.php include file will process the form and push the data into the database.-->