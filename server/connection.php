<?php
$conn=mysqli_connect("localhost","root","","electronic");

if(!$conn){
    die("problem in connecting server " . mysqli_connect_error());
}
