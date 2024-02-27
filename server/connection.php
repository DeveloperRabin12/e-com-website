<?php
$conn=mysqli_connect("localhost","root","","electronic");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}