<?php

// Return all geometries that contain the input point.

$lon = floatval($_GET['lon']);
$lat = floatval($_GET['lat']);
$wkt = "POINT($lat $lon)"; // EPSG 4326 is latitude-longitude

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'demo';
$db_schema = 'demo';

$conn = new mysqli($db_host, $db_user, $db_password, $db_schema);
$sql = "SELECT ST_AsGeoJSON(g) AS geojson FROM areas WHERE ST_Contains(g, ST_GeomFromText(?, 4326)) ORDER BY ST_Area(ST_SRID(g, 0)) DESC;";
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
