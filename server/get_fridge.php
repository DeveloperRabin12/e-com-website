<?php

include ('connection.php');

$stmt = $conn->prepare("SELECT * from products where 'category' = 'fridge' LIMIT 4");

$stmt->execute();

$fridge_result = $stmt->get_result();