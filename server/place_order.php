<?php 

session_start();
include 'connection.php';

if(isset($_POST['place-order'])){

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$order_cost = $_SESSION['total-prc'];
$order_status = "pending";
$user_id = '1';
$order_date = date("Y-m-d H:i:s");
 
$stmt=$conn->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_phone, user_address, order_date) VALUES (?,?,?,?,?,?)");
 
$stmt->bind_param('isiiss', $order_cost, $order_status, $user_id, $phone, $address, $order_date);  
$stmt->execute();

//isssue new order
$order_id=$stmt->insert_id;




 // get products from cart
 foreach($_SESSION['cart'] as $key => $value){
        $product=$_SESSION['cart'][$key];
        $product_id=$product['product_id'];
        $product_name=$product['product_name'];
        $product_price=$product['product_price'];
        $product_image=$product['product_image'];
        $quantity=$product['quantity'];

        //store orders items in database
        $stmt1=$conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, product_image,product_price,product_quantity,user_id,order_date) VALUES (?,?,?,?,?,?,?,?)");
  
        $stmt1->bind_param('iissiiis', $order_id, $product_id, $product_name, $product_image, $product_price, $quantity, $user_id, $order_date);


        $stmt1->execute();

//unset($_SESSION['cart'][$key]);
header('location:../payment.php?order_status=<h3>successfully ordered youur chosen items</h3>');        
}
}
?>