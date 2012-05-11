<!-- has no HTML code cause its just an include.-->

<h1 align="center">THE LATEST RECIPES</h1><br>
<?php

	$con = mysql_connect("localhost", "test", "test") //con for connection
	or die('Sorry, could not connect to database server'); //adds user friendliness. instead of showing them the sql error
	mysql_select_db("recipe", $con) or die('Sorry, could not connect to database'); //doesnt need to be a var since mysql will remember which database
	
	$query = "SELECT count('recipeid') from recipes";
	
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$totrecipes = $row[0];
	if ($totrecipes == 0){
		echo "<h3>Sorry, there are no recipes posted at this time, please try back later.</h3>";
	} 
	else{
		$recipesperpage=5;
		if (isset($_GET['page']))
			$thispage=$_GET['page'];
		else
			$thispage=1;
		$totpages=ceil($totrecipes/$recipesperpage);
		$offset=($thispage-1)*$recipesperpage;
		$query = "SELECT recipeid,title,poster,shortdesc FROM recipes ORDER BY recipeid DESC LIMIT $offset,$recipesperpage";
		$result = mysql_query($query) or die('Sorry, could not get recipes at this time ');
		
		//ASSOC references data fields by name, NUM references data fields by number (startin with 0)
		//fetch_array retrieves the result set from the query and places it into an array variable. 
		//while loop ends when fetch array is false		
		while($row=mysql_fetch_array($result, MYSQL_ASSOC)){
			$recipeid = $row['recipeid'];
			$title = $row['title'];
			$poster = $row['poster'];
			$shortdesc = $row['shortdesc'];
			echo "<a href=\"index.php?content=showrecipe&id=$recipeid\">$title</a> submitted by $poster<br>\n";
			echo"$shortdesc<br><br>\n";
			//clicking on 1 of the links takes user to showrecipe.inc.php
		}
		// if only one page, no reason for page navigation
		if ($totpages>1){
			if ($thispage>1){
				$prev=$thispage-1;
				$prevpage="<a href=\"index.php?content=main&page=$prev\">&lt; Prev</a>";
			}
			else
				$prevpage=" ";

			if ($thispage!=$totpages){
				$next=$thispage+1;
				$nextpage="<a href=\"index.php?content=main&page=$next\">Next &gt;</a>";
			}
			else
				$nextpage=" ";
			$bar="";
			for ($page=1; $page<=$totpages; $page++){
				if ($page==$thispage)
					$bar.=" <b>$page</b> ";
					
				else // brackets around page links to increase mouse target area
					$bar.="<a href=\"index.php?content=main&page=$page\">[$page]</a>";
			}
			
			// table to nicely format page navigation
			echo "<table width=\"100%\">\n";
			echo "<tr><td colspan=\"3\" style=\"text-align: center\">Page $thispage of $totpages</td></tr>\n";
			echo "<tr>\n";
			echo "<center><td\">$prevpage</td>\n";
			echo "<td\">$bar</td>\n";
			echo "<td\">$nextpage</td>\n";
			echo "</tr>\n";
			echo "</table>\n";
		}	
	}
?>
<hr size="1" noshade="noshade">
