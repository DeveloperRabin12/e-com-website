<?php
include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products Limit 4");
$stmt->execute();

$product_result = $stmt->get_result();