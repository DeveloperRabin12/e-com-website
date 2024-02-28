<?php

include('connection.php');

$stmt= $conn->prepare("SELECT * FROM Products where product_category='washing' LIMIT 4");


$stmt->execute();

$washing_result = $stmt->get_result(); 