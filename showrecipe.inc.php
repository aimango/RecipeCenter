<?php
	$con = mysql_connect("localhost", "test", "test") or die('Sorry, could not connect to database server');
	mysql_select_db("recipe", $con) or die('Sorry, could not connect to database');

	$recipeid = $_GET['id'];
	//retrieves the value of the id HTML variable that the main.inc.php program passes 
	//within the URL. It then assigns the value to the PHP variable $recipeid. 

	$query = "SELECT title, shortdesc, poster, ingredients, directions FROM recipes WHERE recipeid = $recipeid";
	//retrives all data fields from specified recipe #


	$result = mysql_query($query) or die ('Sorry, could not find recipe requested');
	$row = mysql_fetch_array($result, MYSQL_ASSOC) or die ('No records retrieved');
	//dont need a while here since we're only retrieving 1 record

	$title = $row['title'];
	$poster = $row['poster'];
	$shortdesc = $row['shortdesc'];
	$ingredients = $row['ingredients'];
	$directions = $row['directions'];

	//converts newlines to <br>'s since HTML ignores the newlines (cool!)
	$ingredients = nl2br($ingredients);
	$directions = nl2br($directions);

	echo "<h2>Recipe: $title</h2>\n";

	echo "Posted by $poster <br><br>\n"; 
	echo $shortdesc . "<br><br>\n"; 
	echo "<h3>Ingredients:</h3>\n"; 
	echo $ingredients . "<br><br>\n";

	echo "<h3>Directions:</h3>\n";
	echo $directions . "\n"; 
	echo "<br><br>\n";

	$query = "SELECT count(commentid) from comments where recipeid = $recipeid";
	//count function counts # occurences of specified data field

	$result = mysql_query($query);
	$row = mysql_fetch_array($result);

	//Since the count() function doesn't return a column name, 
	//we have to use the positional array value to retrieve the value returned ($row [0] ).
	if ($row[0] == 0){
		echo "No comments posted yet. \n<br>";
		echo "<br><h3> Options: </h3> <a href=\"index.php?content=newcomment&id=$recipeid\">Add a comment</a>\n <br>";
		echo "   <a href=\"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n";
		echo "<br><br><hr size=\"1\" noshade=\"noshade\">\n";
	} 
	else{
		echo "<h3>Options: <br> </h3> <a href=\"index.php?content=newcomment&id=$recipeid\">Add a comment</a>\n <br>";
		echo "<a href=\"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n";
		echo "<br><br><hr size=\"1\" noshade=\"noshade\">\n";
		echo "<h3>" . $row[0] . "\n";
		echo " comment(s) posted.  <br>\n";
		echo "<br><h2>Comments:</h2>\n <br>";
		

		$totrecords = $row[0];
		if (!isset($_GET['page']))
		  $thispage = 1;
		else
		$thispage = $_GET['page'];
		$recordsperpage = 5;
		$offset = ($thispage - 1) * $recordsperpage;
		$totpages = ceil($totrecords / $recordsperpage);
		$query = "SELECT date,poster,comment from comments where recipeid = $recipeid order by commentid desc limit $offset,$recordsperpage";
		$result = mysql_query($query) or die('Could not retrieve comments: ' . mysql_error());
		//loops through the comments & prints em out
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			$date = $row['date'];
			$poster = $row['poster'];
			$comment = $row['comment'];
			$comment = nl2br($comment); //convert \n to <br>
			echo $date . " - posted by " . $poster . "\n";
			echo "<br>\n";
			echo $comment . "\n";
			echo "<br><br>\n";
		}
		if ($thispage > 1){
			$page = $thispage - 1;
			$prevpage = "<a href=\"index.php?content=showrecipe&id=$recipeid&page=$page\">< Prev</a>";
		} 
		else{
			$prevpage = " ";
		}
		$bar = '';	
		if ($totpages > 1){ 
			
			for($page = 1; $page <= $totpages; $page++){
				if ($page == $thispage)      
					$bar .= "<b> $page </b>";
				else
					$bar .= " <a href=\"index.php?content=showrecipe&id=$recipeid&page=$page\">[$page]</a> ";
			}
		}
		if ($thispage < $totpages){
			$page = $thispage + 1;
			$nextpage = " <a href=\"index.php?content=showrecipe&id=$recipeid&page=$page\">Next ></a>";
		} else{
			$nextpage = " ";
		}
		//echo "Go to: " . $prevpage . $bar . $nextpage;
		echo "<table width=\"100%\">\n";
		echo "<tr><td colspan=\"3\" style=\"text-align: center\">Page $thispage of $totpages</td></tr>\n";
		echo "<tr>\n";
		echo "<center><td\">$prevpage</td>\n";
		echo "<td\">$bar</td>\n";
		echo "<td\">$nextpage</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
	}
?>















