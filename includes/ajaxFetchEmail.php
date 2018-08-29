<?php

define(DB_USER, "root");
define(DB_PASSWORD, "");
define(DB_DATABASE, "devlukcrm");
define(DB_HOST, "localhost");


$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);


$sql = "SELECT email1 FROM clientdetails WHERE email1 LIKE '%" . $_GET['query'] . "%' LIMIT 10";

$result = $mysqli->query($sql);

$json = [];
while ($row = $result->fetch_assoc()) {
    $json[] = $row['name'];
}

echo json_encode($json);
?>