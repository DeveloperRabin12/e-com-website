<?php
include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products limit 4");
$stmt->execute();

$product_result = $stmt->get_result();