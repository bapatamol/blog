<?php
header('Access-Control-Allow-Origin: http://being-sm.blogspot.com');

if (get_magic_quotes_gpc())
{
     // magic_quotes_gpc is ON
     // so we don't need to do anything
     $rating = $_GETT['rating'];
     $postID = $_GET['postID'];
}
else
{
	// if magic quotes is off, we need to add slashes in order to prevent injection attacks.
    $rating = addslashes($_GET['rating']);
    $postID = addslashes($_GET['postID']);
}

//echo "rating = '" . $rating . "' <br/>";
//echo "postID = '" . $postID . "' <br/>";

// if no input, return no suggestions back to the user
// connect to database
require "../dbconnect.php"; 
// suggest table name has "suggest" column with possible suggestion values;
// query to query suggest table

// ensure the postID exists, if not ad it.
$query = "select ratingCount from rating where postID = '" . $postID . "'";
//echo $query;

//echo "<br/>";
$result = mysql_query($query);

if(mysql_fetch_array($result) === false) {
    $insertQuery = "insert into rating values (0, 0, 0, 0, 0, 0, '". $postID ."') ";
    //echo $insertQuery . "<br/>";
    mysql_query($insertQuery);
}


$query = "update rating set rating" . $rating . " =  rating" . $rating . " + 1, ratingCount = ratingCount + 1 where postID = '" . $postID . "'";

//echo $query;
// execute query
mysql_query($query);  

?>
