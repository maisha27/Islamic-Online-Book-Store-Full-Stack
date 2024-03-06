<?php

include 'connect.php';

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);

   $existing_email_query = mysqli_query($conn, "SELECT * FROM `newsletter` WHERE email = '$email'");
   if(mysqli_num_rows($existing_email_query) > 0) {
      $message[] = 'Email already subscribed!';
   } else {
      $result = mysqli_query($conn, "INSERT INTO `newsletter`(email) VALUES('$email')");
      if ($result) {
         $message[] = 'Thank you for subscribing!';
      } else {
         $message[] = 'An error occurred. Please try again later.';
         header('location:index.php');
      }
   }
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css">
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Alex Brush' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Raleway Dots' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>


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

<section class="newsletter" style="background-attachment: fixed;">
    <form action="" method="post">
        <h3>Subscribe For Latest Updates</h3>
        <input type="email" name="email" placeholder="enter your email" id="email" class="box">
        <input type="submit" value="subscribe" class="btn" name="submit">
    </form>
</section>







<script src="images/scrollreveal.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>