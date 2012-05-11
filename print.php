<html>
<body>

<head>
<link rel="stylesheet" type="text/css" href="print.css" />
<title>The Recipe Center - Printer Friendly</title>
</head>
<table width="400" border="1">
<tr><td>
<?php
$con = mysql_connect("localhost","test","test") or die('Sorry, could not connect to server');
mysql_select_db("recipe",$con) or die ('Could not connect to database');

$recipeid = $_GET['id'];

$query = "SELECT title,poster,shortdesc,ingredients,directions from recipes where recipeid = $recipeid";
$result = mysql_query($query) or die('Could not find recipe');
$row = mysql_fetch_array($result,MYSQL_ASSOC) or die('No records retrieved');

$title = $row['title'];
$poster = $row['poster'];
$shortdesc = $row['shortdesc'];
$ingredients = $row['ingredients'];
$directions = $row['directions'];

$ingredients = nl2br($ingredients);
$directions = nl2br($directions);

echo "<h2>$title</h2>\n";

echo "Posted by $poster <br>\n";
echo "Description: " . $shortdesc . "\n";
echo "<h3>Ingredients:</h3>\n";
echo $ingredients . "<br>\n";

echo "<h3>Directions:</h3>\n";
echo $directions . "\n";
?>
</td></tr></table>
</body>
</html>