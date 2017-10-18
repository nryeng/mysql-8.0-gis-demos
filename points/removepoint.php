<?php

// Remove the closest point in the map.

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'demo';
$db_schema = 'demo';

$conn = new mysqli($db_host, $db_user, $db_password, $db_schema);

if (isset($_GET['lon']) && isset($_GET['lat'])) {
  $lon = floatval($_GET['lon']);
  $lat = floatval($_GET['lat']);
  $wkt = "POINT($lat $lon)"; // EPSG 4326 is latitude-longitude
  
  $sql =  "DELETE FROM points ";
  $sql .= "WHERE ST_Distance(ST_GeomFromText(?, 4326), point) < 1000 ";
  $sql .= "ORDER BY ST_Distance(ST_GeomFromText(?, 4326), point) ";
  $sql .= "LIMIT 1";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ss', $wkt, $wkt);
  $stmt->execute();
}

?>
