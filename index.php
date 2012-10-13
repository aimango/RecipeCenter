<?php
	session_start(); //allow us to store unique user information in the visitor's Web browser
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!--reference an external style sheet -->
		<link rel="stylesheet" type="text/css" href="mystyle.css" />

		<!--for printer friendly page-->
		<link rel="stylesheet" media="print" type="text/css" href="print.css" />
		
		<title>The Recipe Center</title>
	</head>

	<body>
		<table width="100%" border="0">
			<tr>
				<td id="header" height="90" colspan="3">
					<?php include("header.inc.php"); ?>
				</td>
			</tr>
			<tr>
				<td id="nav" width="10%" valign="top">
					<?php include("nav.inc.php"); ?>
				</td>
				<td id="main" width="50%" valign="top">
					<?php
						if (!isset($_REQUEST['content'])){
							include("main.inc.php");
						}
						else {
							$content = $_REQUEST['content'];
							$nextpage = $content . ".inc.php";
							include($nextpage);
						} 

						if (isset($_SESSION['valid_recipe_user'])){
						   $userid = $_SESSION['valid_recipe_user'];
						   echo "<br><h2>Logged in as <big>$userid</big>.</h2><br>";
						}
					?>
				</td>
				<td id="news" width="40%" valign="top">
					 <?php include("news.inc.php"); ?>
				</td>
			</tr>

			<tr>
				<td id="footer" colspan="3">
					<div align="center">
						<?php include("footer.inc.php"); ?>
					</div>
				</td>
			</tr>
		  
		</table>
	</body>
</html>
