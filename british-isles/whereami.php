<?php

// Return a description of the input location.

$lon = floatval($_GET['lon']);
$lat = floatval($_GET['lat']);
$wkt = "POINT($lat $lon)"; // EPSG 4326 is latitude-longitude

print ("Latitude: $lat\n");
print ("Longitude: $lon\n\n");

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'demo';
$db_schema = 'demo';

$conn = new mysqli($db_host, $db_user, $db_password, $db_schema);
$sql = "SELECT GROUP_CONCAT(name ORDER BY ST_Area(g) ASC SEPARATOR ', ') AS location FROM areas WHERE ST_Contains(g, ST_GeomFromText(?, 4326));";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $wkt);
$stmt->execute();

$stmt->bind_result($location);
$stmt->fetch();

print("Location: $location\n");

?>
