<?php

include ('connection.php');

$stmt = $conn->prepare("SELECT * from products where product_category = 'fridge'");

$stmt->execute();

$f_result = $stmt->get_result();

