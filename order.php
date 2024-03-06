<?php

include 'connect.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Orders</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css">
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Alex Brush' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Raleway Dots' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading1">
   <h3>your orders</h3>
   <p> <a href="index.php">Home</a> / orders </p>
</div>

<section class="placed-orders">

    <h1 class="heading"><span>Placed Orders</span></h1>

        <div class="box-container">

            <?php
                $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($order_query) > 0){
                    while($fetch_orders = mysqli_fetch_assoc($order_query)){
            ?>
            <div class="box">
                <p> Order ID : <span><?php echo $fetch_orders['id']; ?></span> </p>
                <p> Date : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
                <p> Name : <span><?php echo $fetch_orders['name']; ?></span> </p>
                <p> Phone Number : <span>+88<?php echo $fetch_orders['number']; ?></span> </p>
                <p> Email : <span><?php echo $fetch_orders['email']; ?></span> </p>
                <p> Address : <span><?php echo $fetch_orders['address']; ?></span> </p>
                <p> Payment Method : <span><?php echo $fetch_orders['method']; ?></span> </p>
                <p> Your Orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
                <p> Total Price : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
                <p> Payment Status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
                </div>
            <?php
            }
            }else{
                echo '<p class="empty">No Orders Placed Yet!</p>';
            }
            ?>
        </div>

</section>








<?php include 'footer.php'; ?>

<script src="images/scrollreveal.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="script.js"></script>

</body>
</html>