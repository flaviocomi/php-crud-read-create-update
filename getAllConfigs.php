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

if ($res->num_rows < 1) {
  echo json_encode(-2);
  return;
}

$tabs = [];

while ($tab = $res->fetch_assoc()) {
  $tabs[] = $tab;
}

echo json_encode($tabs);
