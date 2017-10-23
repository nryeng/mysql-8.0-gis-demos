<?php

// Return all bars, cafes and pubs in the map.

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'demo';
$db_schema = 'demo';

$conn = new mysqli($db_host, $db_user, $db_password, $db_schema);
$sql = "SELECT JSON_OBJECT('type', 'Feature', 'geometry', ST_AsGeoJSON(position), 'properties', JSON_OBJECT('name', name)) AS geojson FROM bars";
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
  print("\n$geojson");
}

print("\n]}\n");

$stmt->close();
$conn->close();

?>
