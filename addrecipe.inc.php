<?php

	$title = $_POST['title'];
	$poster = $_POST['poster'];
	$shortdesc = $_POST['shortdesc'];
	$ingredients = htmlspecialchars($_POST['ingredients']);
	$directions = htmlspecialchars($_POST['directions']);
	//htmlspecialchars converts HTML code characters into text values that the Web browser will display but not interpret as HTML code. 

	if (!get_magic_quotes_gpc()){ //add backslashes to single+double quotes & backslashes for these 2 fields
	   $ingredients = addslashes($ingredients);
	   $directions = addslashes($directions);
	}

	if (trim($poster) == ''){//trim will get rid of leading/trailing spaces. also checks for blank poster name
		echo "<h2>Sorry, each recipe must have a poster.</h2>\n";
	}
	else{
		$con = mysql_connect("localhost", "test", "test") or die('Could not connect to server.');
		mysql_select_db("recipe", $con) or die('Could not connect to database.');
		
		$query = "INSERT INTO recipes (title, shortdesc, poster, ingredients, directions) " .
		" VALUES ('$title', '$shortdesc', '$poster', '$ingredients', '$directions')";

		$result = mysql_query($query) or die('Sorry, we could not post your recipe to the database at this time :(');

		if ($result)
			echo "<h2>Recipe posted!</h2>\n";
		else
			echo "<h2>Sorry, there was a problem posting your recipe :(</h2>\n";
	}
?>