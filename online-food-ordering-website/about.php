<?php
include 'component/connect.php';
session_start();

/*if(isset($_SESSION['user_id'])){
   $user_id =$_SESSION['user_id'];
}else{
   $user_id = '';
}*/
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <!--header start--> 
   <?php include 'component/user_header.php' ?>
   
   <div class="heading">
      <h3>about us</h3>
      <p><a href="home.php">home</a>,<span> / about</span></p>
   </div>
   <!--about section start-->
   <div class="color">
 <section class="about">
   <div class="row">
      <div class="image">
      <img src="images/about-img.svg" alt="">
   </div>
 
   
<div class="content">
   <h3>why choose us?</h3>
   <p>Choose us for your restaurant's online food ordering website for top-notch food quality,
       delectable taste, and prompt delivery. With our platform, ensure a seamless experience with user-friendly interfaces, 
       customizable options, and reliable support. Elevate your restaurant's online presence while delighting customers 
       with exceptional service and delicious meals.</p>
       <a href="menu.html" class="btn">our menu</a>
       </div>
      </div>
 </section>

<!--about section end-->


<?php include 'component/footer.php'; ?>
</body>
</html>