<?php

// Return all sights in the map.

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'demo';
$db_schema = 'demo';

$conn = new mysqli($db_host, $db_user, $db_password, $db_schema);
$sql = "SELECT JSON_OBJECT('type', 'Feature', 'geometry', ST_AsGeoJSON(pos), 'properties', JSON_OBJECT('description', description)) AS geojson FROM sights";
if (!$result = $conn->query($sql)) {
  print("Failed to execute query.\n");
}

print('{"type":"FeatureCollection","crs":{"type":"name","properties":{"name":"EPSG:4326"}},"features": [' . "\n");

$first = 1;
while ($row = $result->fetch_assoc()) {
  if (!$first) {
    print(',');
  } else {
    $first = 0;
  }
  print("\n" . $row['geojson']);
}
$result->free();

print("\n]}\n");

$conn->close();

?>
