<?php

// Return all points in the map.

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'demo';
$db_schema = 'demo';

$conn = new mysqli($db_host, $db_user, $db_password, $db_schema);
$sql = "SELECT ST_AsGeoJSON(point) AS geojson FROM points";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $wkt);
$stmt->execute();

print('{"type":"FeatureCollection","crs":{"type":"name","properties":{"name":"EPSG:4326"}},"features": [' . "\n");

$stmt->bind_result($geojson);
$first = 1;
while ($stmt->fetch()) {
  if (!$first) {
    print(',');
  } else {
    $first = 0;
  }
  print($geojson . "\n");
}

print("]}\n");

?>
