<html>
  <head>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script>
    google.load('visualization', '1', { 'packages': ['map'] });
    google.setOnLoadCallback(drawMap);

    function drawMap() {
      var data = google.visualization.arrayToDataTable([
        ['Country', 'Count'],

<?php

require "../dbconnect.php";
$query = "select count(remote_addr), remote_addr from blog_snoop group by remote_addr";
$result = mysql_query($query);

while ($row = mysql_fetch_array($result, MYSQL_NUM))
{
        $ct =  $row[0];
        $ip =  $row[1];

        $response=@file_get_contents('http://www.netip.de/search?query='.$ip);
        
        $country = '#Country: (.*?)&nbsp;#i';
        preg_match ($country, $response, $c);

        $state = '#State/Region: (.*?)<br#i';
	preg_match ($state, $repsonse, $s);

	$town = '#City: (.*?)<br#i';
	preg_match ($town, $response, $t);

	//echo $c[1] . " " . empty($c[1]);
	//echo "\n";
	//echo $s[1] . " " . empty($s[1]);
	//echo "\n";
	//echo $t[1] . " " . empty($t[1]);
	//echo "\n";
	
	if (!empty($t[1])) {
		$loc = $t[1];
	} else if (!empty($s[1])) {
		$loc = $s[1];
	} else if (!empty($c[1])) {
		$loc = $c[1];
	}
	echo "['".trim($loc)."', '".trim($loc).": ".$ct."'],";
}
?>

      ]);

    var options = { showTip: true , zoomLevel: 2};

    var map = new google.visualization.Map(document.getElementById('chart_div'));

    map.draw(data, options);
  };
  </script>
  </head>
  <body>
    <div id="chart_div"></div>
  </body>
</html>
