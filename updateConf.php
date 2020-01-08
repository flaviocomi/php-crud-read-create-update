<?php

header('Content-Type: application/json');

list($id, $title, $desc) = [
  $_POST['id'],
  $_POST['title'],
  $_POST['description']
];

if (!$id || !$title || !$desc) {
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
  UPDATE configurazioni
  SET title = ? , description = ?
  WHERE id = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $title, $desc, $id);

$res = $stmt->execute();
$conn->close();

echo json_encode($res);
