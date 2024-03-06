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
    <title>Islamic Book Store</title>

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

    <!--login-->


   <!--Home section-->
   <section class="home" id="home">
    <div class="row">
        <div class="content">
            <h3>Dive into Islamic Wisdom</h3>
            <p>
                Explore the profound teachings of Islamic wisdom, offering insights to navigate life's journey with clarity and purpose. Discover timeless truths that resonate with seekers of inner peace, inviting reflection and growth.</p>
            <a href="shop.php" class="btn">Discover Now</a>
        </div>

        <div class="swiper books-slider">
            <div class="swiper-wrapper">
                <a href="#"class="swiper-slide"><img src="images/Book1.png" alt=""></a>
                <a href="#"class="swiper-slide"><img src="images/Book2.png" alt=""></a>
                <a href="#"class="swiper-slide"><img src="images/book3.png" alt=""></a>
                <a href="#"class="swiper-slide"><img src="images/Book4.png" alt=""></a>
                <a href="#"class="swiper-slide"><img src="images/Book5.png" alt=""></a>
                <a href="#"class="swiper-slide"><img src="images/Book6.png" alt=""></a>
            </div>
            <img src="images/stand.png" class="stand" alt="">
        </div>
    </div>
</section>

<!--icons-->

<section class="icons-container">
    <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <div class="content">
            <h3>Free Shipping</h3>
            <p>Order more than $100</p>
        </div>
    </div>
    <div class="icons">
        <i class="fas fa-lock"></i>
        <div class="content">
            <h3>Secure Payment</h3>
            <p>100% Secure payment</p>
        </div>
    </div>
    <div class="icons">
        <i class="fas fa-redo-alt"></i>
        <div class="content">
            <h3>Easy Returns</h3>
            <p>return in 10 days</p>
        </div>
    </div>
    <div class="icons">
        <i class="fas fa-headset"></i>
        <div class="content">
            <h3>24/7 Support</h3>
            <p>Call us anytime</p>
        </div>
    </div>

</section>

<section class="Featured" id="featured">
    <h1 class="heading"><span>Books</span></h1>
        <div class="swiper featured-slider">
            <div class="swiper-wrapper">
                <form action="" method="post"class="swiper-slide box">
                    
                    
                    <div class="icons">
                        <a href="" class="ri-search-2-line"></a>
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



<!--Discount-->
<section class="discount" id="discount">
    <div class="discount__container">
        <div class="discount__data">
            <h2 class="discount__title section__title">
                Up to 55% Discount
            </h2>
            <p class="discount__description">
                Explore our  Discount Section for amazing savings! With discounts on a wide range of titles, finding your next favorite read has never been more affordable. Don't miss out on unbeatable prices. Shop now and enjoy the thrill of saving big!
            </p>

            <a href="shop.php" class="btn">Shop Now</a>
        </div>
        <div class="discount__images">
            <img src="images/Book10.png" alt="image" class="discount__img-1">
            <img src="images/Book11.png" alt="image" class="discount__img-2">
        </div>
    </div>
</section>

<?php include 'subscribe.php';?>
<!--Discount-->

<!--New Arrivals-->
<section class="arrivals" id="arrivals">
    <h1 class="heading"><span>All Time Best Sellers</span></h1>
    <div class="swiper arrivals-slider">
        <div class="swiper-wrapper">
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="images/Book12.png" alt="">
                </div>
                <div class="content">
                    <h3>Seerah</h3>
                    <div class="price">$13.99<span> $17.99</span></div>
                    <div class="stars">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                    </div>
                </div>
            </a>
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="images/Book2.png" alt="">
                </div>
                <div class="content">
                    <h3>Enlightenment</h3>
                    <div class="price">$13.99<span> $17.99</span></div>
                    <div class="stars">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                    </div>
                </div>
            </a>
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="images/book3.png" alt="">
                </div>
                <div class="content">
                    <h3>Our Prophet</h3>
                    <div class="price">$13.99<span> $17.99</span></div>
                    <div class="stars">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                    </div>
                </div>
            </a>
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="images/Book4.png" alt="">
                </div>
                <div class="content">
                    <h3>Islam and Wedding</h3>
                    <div class="price">$13.99<span> $17.99</span></div>
                    <div class="stars">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="swiper arrivals-slider">
        <div class="swiper-wrapper">
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="images/Book5.png" alt="">
                </div>
                <div class="content">
                    <h3>Love in Islam</h3>
                    <div class="price">$13.99<span> $17.99</span></div>
                    <div class="stars">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                    </div>
                </div>
            </a>
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="images/Book6.png" alt="">
                </div>
                <div class="content">
                    <h3>Allahs Mercy</h3>
                    <div class="price">$13.99<span> $17.99</span></div>
                    <div class="stars">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                    </div>
                </div>
            </a>
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="images/Book13.png" alt="">
                </div>
                <div class="content">
                    <h3>Night of Blessing</h3>
                    <div class="price">$13.99<span> $17.99</span></div>
                    <div class="stars">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                    </div>
                </div>
            </a>
            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="images/Book14.png" alt="">
                </div>
                <div class="content">
                    <h3>Ramadan</h3>
                    <div class="price">$13.99<span> $17.99</span></div>
                    <div class="stars">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<!--New Arrivals-->



<!--Customer Reviews-->

<section class="reviews" id="reviews">

    <h1 class="heading"><span>Customer's Reviews</span></h1>
    <div class="swiper reviews-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide box">
                <img src="images/testimonial-perfil-1.png" alt="">
                <h3>Marjaan</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem nisi consequatur sint. Officiis, quasi dignissimos unde nemo optio quae, adipisci esse error reprehenderit, praesentium repellendus molestias distinctio quos. Nam, debitis.</p>
                <div class="stars">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-half-fill"></i>
                </div>
            </div>
            <div class="swiper-slide box">
                <img src="images/testimonial-perfil-4.png" alt="">
                <h3>Hasim</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem nisi consequatur sint. Officiis, quasi dignissimos unde nemo optio quae, adipisci esse error reprehenderit, praesentium repellendus molestias distinctio quos. Nam, debitis.</p>
                <div class="stars">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-half-fill"></i>
                </div>
            </div>
            <div class="swiper-slide box">
                <img src="images/testimonial-perfil-3.png" alt="">
                <h3>Ayesha</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem nisi consequatur sint. Officiis, quasi dignissimos unde nemo optio quae, adipisci esse error reprehenderit, praesentium repellendus molestias distinctio quos. Nam, debitis.</p>
                <div class="stars">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-half-fill"></i>
                </div>
            </div>
            <div class="swiper-slide box">
                <img src="images/testimonial-perfil-2.png" alt="">
                <h3>Anas</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem nisi consequatur sint. Officiis, quasi dignissimos unde nemo optio quae, adipisci esse error reprehenderit, praesentium repellendus molestias distinctio quos. Nam, debitis.</p>
                <div class="stars">
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-fill"></i>
                    <i class="ri-star-half-fill"></i>
                </div>
            </div>
        </div>

    </div>
</section>

<!--Customer Reviews-->


<?php include 'footer.php';?>

<script src="images/scrollreveal.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>