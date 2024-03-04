<?php
include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();

$all_result = $stmt->get_result();