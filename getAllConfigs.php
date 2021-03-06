<?php

header('Content-Type: application/json');

$server = "localhost";
$username = "root";
$password = "root";
$dbname = "hoteldb";
$port = "3307";

$conn = new mysqli($server, $username, $password, $dbname, $port);

if ($conn->connect_errno) {
  echo json_encode(-1);
  return;
}

$sql = "
  SELECT *
  FROM configurazioni
";

$res = $conn->query($sql);
$conn->close();

if ($res->num_rows < 1) {
  echo json_encode(-2);
  return;
}

$confs = [];

while ($conf = $res->fetch_assoc()) {
  $confs[] = $conf;
}

echo json_encode($confs);
