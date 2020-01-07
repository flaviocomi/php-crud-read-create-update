<?php

header('Content-Type: application/json');

list($title, $description) = [
  $_POST['title'],
  $_POST['description']
];

if (!$title || !$description) {
  echo json_encode(-2);
  return;
}

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

  INSERT INTO configurazioni (title, description)
  VALUES ( ? , ? )

";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $title, $description);

$res = $stmt->execute();

echo json_encode($res);
