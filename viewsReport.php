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
        preg_match ($country, $response, $value);

        $loc = trim(substr($value[0], 13));
	$loc = substr($loc, 0,  strpos ($loc, "&nbsp;"));
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
