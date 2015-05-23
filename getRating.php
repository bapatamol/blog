<?php
header('Access-Control-Allow-Origin: http://being-sm.blogspot.com');

if (get_magic_quotes_gpc())
{
     // magic_quotes_gpc is ON
     // so we don't need to do anything
     $postID = $_GET['postID'];
}
else
{
	// if magic quotes is off, we need to add slashes in order to prevent injection attacks.
    $postID = addslashes($_GET['postID']);
}
// connect to database
require "../dbconnect.php"; 

$query = "select rating1, rating2, rating3, rating4, rating5, ratingCount from rating where postID = '". $postID . "'";
// execute query
$result = mysql_query($query);
// loop through results
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	// print out results to standard out
	$r1 =  $row['rating1'];
	$r2 =  $row['rating2'];
	$r3 =  $row['rating3'];
	$r4 =  $row['rating4'];
	$r5 =  $row['rating5'];
	$rC =  $row['ratingCount'];
}

$r = (5 * $r5 + 4 * $r4 + 3 * $r3 + 2 * $r2 + 1 * $r1) / $rC;

echo $r;
?>
