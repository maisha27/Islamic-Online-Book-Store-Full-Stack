<?php

include 'connect.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'your cart is empty';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'order already placed!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'order placed successfully!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      }
   }
   
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css">
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Alex Brush' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Raleway Dots' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php';?>

<div class="heading1">
   <h3>Check Out</h3>
   <p> <a href="index.php">Home</a> / Checkout </p>
</div>

<div class="container">

   <!-- Part 1: Products in Cart -->
    <section class="cart-section">
        <h3 class="head"><span>Your Cart</span></h3>
            <div class="cart-items">
            <?php  
                $grand_total = 0;
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                        $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                        $grand_total += $total_price;
            ?>
                <div class="cart-item">
                    <div class="item-details">
                        <div class="item-image"><img src="<?php echo $fetch_cart['image']; ?>" alt=""></div>
                        <div class="item-info">
                        <p>Name: <span><?php echo $fetch_cart['name']; ?></span></p>
                            <p>Quantity: <span><?php echo $fetch_cart['quantity']; ?></span></p>
                            <p>Total: <span>$ <?php echo $total_price ?></span></p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }else
                {
                    echo '<p class="empty">your cart is empty</p>';
                }
                ?>
            </div>
            <div class="cart-total">Grand Total : <span>$<?php echo $grand_total; ?>/-</span> </div>
   </section>

   <!-- Part 2: Checkout Information -->
   <section class="checkout-section">
   <h3 class="head"><span>Checkout Information</span></h3>
      <form action="" method="post" class="checkout-form">
         <!-- Form fields for user's checkout information -->
         <!-- You can add more fields as needed -->
         <div class="form-group">
            <span>Your Name :</span>
            <input type="text" name="name" required placeholder="enter your name">
         </div>
         <div class="form-group">
            <span>Your Phone Number :</span>
            <input type="tel" name="number" required placeholder="enter your number">
         </div>
         <div class="form-group">
            <span>Your Email :</span>
            <input type="email" name="email" required placeholder="enter your email">
         </div>
         <div class="form-group">
            <span>Payment Method :</span>
            <select name="method">
               <option value="cash on delivery">cash on delivery</option>
               <option value="credit card">credit card</option>
               <option value="paypal">paypal</option>
               <option value="bkash">Bkash</option>
            </select>
         </div>
         <div class="form-group">
            <span>Address Line 01 :</span>
            <input type="number" min="0" name="flat" required placeholder="e.g. flat no.">
         </div>
         <div class="form-group">
            <span>Address Line 02 :</span>
            <input type="text" name="street" required placeholder="e.g. street name">
         </div>
         <div class="form-group">
            <span>City :</span>
            <input type="text" name="city" required placeholder="e.g. mumbai">
         </div>
         <div class="form-group">
            <span>State :</span>
            <input type="text" name="state" placeholder="e.g. maharashtra">
         </div>
         <div class="form-group">
            <span>Country :</span>
            <input type="text" name="country" required placeholder="e.g. india">
         </div>
         <div class="form-group">
            <span>Pin Code :</span>
            <input type="number"  name="pin_code" required placeholder="e.g. 123456">
         </div>
         <!-- Add more form fields for other checkout information -->
         <input type="submit" value="order now" class="btn" name="order_btn">
      </form>
   </section>

</div>


<?php include 'footer.php';?>

<script src="images/scrollreveal.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="script.js"></script>

</body>
</html>
