<h3>WHAT'S COOKIN - THE LATEST NEWS</h3>


<?php

	$con = mysql_connect("localhost","test","test") or die('Sorry, could not connect to server');
	mysql_select_db("recipe", $con) or die ('Sorry, could not connect to database server');
	
	$query = "select title,date,article from news order by date desc limit 0,2";
	$result = mysql_query($query) or die ('Sorry, could not get news entries at this time');
	

	while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
		$date = $row['date'];
		$title = $row['title'];
		$article = $row['article'];
		echo"<br>$date - <b> $title </b><br> $article <br><br>\n";
	}	

?>