<?php

include('connection.php');

$stmt= $conn->prepare("SELECT * from Products Where product_category='houseitems' ");

$stmt->execute();

$houseitem_result = $stmt->get_result();


