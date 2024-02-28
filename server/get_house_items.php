<?php

include('connection.php');

$stmt= $conn->prepare("SELECT * from Products Where 'category'='houseitems' LIMIT 4");

$stmt->execute();

$houseitem_result = $stmt->get_result();


