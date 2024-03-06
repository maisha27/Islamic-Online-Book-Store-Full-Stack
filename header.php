<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css">
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Alex Brush' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Raleway Dots' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="style.css">
    <title>Header</title>
</head>
<body>
<header class="header">
    <div class="header-3">
        <div class="upper">
           <div class="links">
              <a href="#" class="fab fa-facebook-f"></a>
              <a href="#" class="fab fa-twitter"></a>
              <a href="#" class="fab fa-instagram"></a>
              <a href="#" class="fab fa-linkedin"></a>
           </div>
           <div class="pages"><p> new <a href="login.php" id="login-button">login</a>  |  <a href="register.php" id="register-button">register</a> </p></div>
        </div>
    </div>

    <div class="header-1">
        <a href="index.php" class="logo"><i class="fa-solid fa-book"></i> Bayt Al-Ilm</a>
        </form>
        <div class="icons">
            <a href="search.php" id="search-btn" class="ri-search-line"></a>
            <a href="#" class="ri-heart-line"></a>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"class="ri-shopping-cart-line"><span>(<?php echo $cart_rows_number; ?>)</span></a>
            <a href="temporary.php" class="ri-user-line"></a>
            
        </div>
    </div>
    <div class="header-2">
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="shop.php">Shop</a>
            <a href="#arrivals">Featured</a>
            <a href="#reviews">Reviews</a>
            <a href="order.php">Orders</a>
            <a href="contact.php">Contact</a>
        </nav>
    </div>
</header>

<script src="images/scrollreveal.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>