<?php
include '../includes/connect.php';

$message = htmlspecialchars($_POST['message']);
$sender_name = $_POST['sender_name'];
$sender_phone = $_POST['sender_phone'];
$sender_address = $_POST['sender_address'];
$recipient_name = $_POST['recipient_name'];
$recipient_phone = $_POST['recipient_phone'];
$recipient_address = $_POST['recipient_address'];
$fee = $_POST['fee'];
$goods = $_POST['goods'];
$sql = "INSERT INTO create_orders (sender_name, sender_phone, sender_address, recipient_name, recipient_phone, recipient_address, fee, goods, message) VALUES ($sender_name, $sender_phone, $sender_address, $recipient_name, $recipient_phone, $recipient_address, $fee, $goods, '$message')";
		$con->query($sql);


        header("location: ../orders.php");
?>

<?php

// 	if ($con->query($sql) === TRUE){
// 		$order_id =  $con->insert_id;
// 		foreach ($_POST as $key => $value)
// 		{
// 			if(is_numeric($key)){
// 			$result = mysqli_query($con, "SELECT * FROM items WHERE id = $key");
// 			while($row = mysqli_fetch_array($result))
// 			{
// 				$price = $row['price'];
// 			}
// 				$price = $value*$price;
// 			$sql = "INSERT INTO order_details (order_id, item_id, quantity, price) VALUES ($order_id, $key, $value, $price)";
// 			$con->query($sql) === TRUE;		
// 			}
// 		}
// 		if($_POST['payment_type'] == 'Wallet'){
// 		$balance = $balance - $total;
// 		$sql = "UPDATE wallet_details SET balance = $balance WHERE wallet_id = $wallet_id;";
// 		$con->query($sql) === TRUE;
// 		}
// 			header("location: ../orders.php");
// 	}

?>