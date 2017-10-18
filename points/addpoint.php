<?php

// Add a point to the map.

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'demo';
$db_schema = 'demo';

$conn = new mysqli($db_host, $db_user, $db_password, $db_schema);

if (isset($_GET['lon']) && isset($_GET['lat'])) {
  $lon = floatval($_GET['lon']);
  $lat = floatval($_GET['lat']);
  $wkt = "POINT($lat $lon)"; // EPSG 4326 is latitude-longitude
  $sql = "INSERT INTO points(point) VALUES (ST_GeomFromText(?, 4326))";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $wkt);
  $stmt->execute();
}

?>
