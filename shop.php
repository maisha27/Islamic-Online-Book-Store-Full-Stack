<?php

include 'connect.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

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
   <h3>our shop</h3>
   <p> <a href="index.php">Home</a> / Shop </p>
</div>

<section class="Featured" id="featured">
    <h1 class="heading"><span>Books</span></h1>
        <div class="swiper featured-slider">
            <div class="swiper-wrapper">
                <form action="" method="post"class="swiper-slide box">
                    
                    
                    <div class="icons">
                        <a href="#" class="ri-search-2-line"></a>
                        <a href="#" class="ri-heart-2-line"></a>
                        <a href="#" class="ri-eye-line"></a>

                    </div>
                    <div class="image">
                        <img src="images/Book4.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Islam and Wedding</h3>
                        <div class="price">
                            $15.99
                        </div>
                        <input type="number" min="1" name="product_quantity" value="1" class="qty">
                        <input type="hidden" name="product_name" value="Islam and Wedding">
                        <input type="hidden" name="product_price" value="15.99">
                        <input type="hidden" name="product_image" value="images/Book4.png">
                        <input type="submit" value="Add to Cart" name="add_to_cart" class="btn">
                    </div>
                </form>
                <form action="" method="post"class="swiper-slide box">
                    
                    
                    <div class="icons">
                        <a href="#" class="ri-search-2-line"></a>
                        <a href="#" class="ri-heart-2-line"></a>
                        <a href="#" class="ri-eye-line"></a>

                    </div>
                    <div class="image">
                        <img src="images/Book5.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Faith</h3>
                        <div class="price">
                            $14.99
                        </div>
                        <input type="number" min="1" name="product_quantity" value="1" class="qty">
                        <input type="hidden" name="product_name" value="Faith">
                        <input type="hidden" name="product_price" value="14.99">
                        <input type="hidden" name="product_image" value="images/Book5.png">
                        <input type="submit" value="Add to Cart" name="add_to_cart" class="btn">
                    </div>
                </form>
                <form action="" method="post"class="swiper-slide box">
                    
                    
                    <div class="icons">
                        <a href="#" class="ri-search-2-line"></a>
                        <a href="#" class="ri-heart-2-line"></a>
                        <a href="#" class="ri-eye-line"></a>

                    </div>
                    <div class="image">
                        <img src="images/Book12.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Seerah</h3>
                        <div class="price">
                            $20.99
                        </div>
                        <input type="number" min="1" name="product_quantity" value="1" class="qty">
                        <input type="hidden" name="product_name" value="Seerah">
                        <input type="hidden" name="product_price" value="20.99">
                        <input type="hidden" name="product_image" value="images/Book12.png">
                        <input type="submit" value="Add to Cart" name="add_to_cart" class="btn">
                    </div>
                </form>
                <form action="" method="post"class="swiper-slide box">
                    
                    
                    <div class="icons">
                        <a href="#" class="ri-search-2-line"></a>
                        <a href="#" class="ri-heart-2-line"></a>
                        <a href="#" class="ri-eye-line"></a>

                    </div>
                    <div class="image">
                        <img src="images/Book17.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Story of Reverts</h3>
                        <div class="price">
                            $22.99
                        </div>
                        <input type="number" min="1" name="product_quantity" value="1" class="qty">
                        <input type="hidden" name="product_name" value="Story of Reverts">
                        <input type="hidden" name="product_price" value="22.99">
                        <input type="hidden" name="product_image" value="images/Book17.png">
                        <input type="submit" value="Add to Cart" name="add_to_cart" class="btn">
                    </div>
                </form>
                <form action="" method="post"class="swiper-slide box">
                    
                    
                    <div class="icons">
                        <a href="#" class="ri-search-2-line"></a>
                        <a href="#" class="ri-heart-2-line"></a>
                        <a href="#" class="ri-eye-line"></a>

                    </div>
                    <div class="image">
                        <img src="images/Book14.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Ramadan</h3>
                        <div class="price">
                            $17.99
                        </div>
                        <input type="number" min="1" name="product_quantity" value="1" class="qty">
                        <input type="hidden" name="product_name" value="Ramadan">
                        <input type="hidden" name="product_price" value="17.99">
                        <input type="hidden" name="product_image" value="images/Book14.png">
                        <input type="submit" value="Add to Cart" name="add_to_cart" class="btn">
                    </div>
                </form>
                <form action="" method="post"class="swiper-slide box">
                    
                    
                    <div class="icons">
                        <a href="#" class="ri-search-2-line"></a>
                        <a href="#" class="ri-heart-2-line"></a>
                        <a href="#" class="ri-eye-line"></a>

                    </div>
                    <div class="image">
                        <img src="images/Book15.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Life and Islam</h3>
                        <div class="price">
                            $15.99
                        </div>
                        <input type="number" min="1" name="product_quantity" value="1" class="qty">
                        <input type="hidden" name="product_name" value="Life and Islam">
                        <input type="hidden" name="product_price" value="15.99">
                        <input type="hidden" name="product_image" value="images/Book15.png">
                        <input type="submit" value="Add to Cart" name="add_to_cart" class="btn">
                    </div>
                </form>

            </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
         
        </div>       

</section>



<?php include 'footer.php';?>

<script src="images/scrollreveal.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>