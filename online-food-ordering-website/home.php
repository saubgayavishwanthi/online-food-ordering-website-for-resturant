<?php
include 'component/connect.php';
session_start();

/*if(isset($_SESSION['user_id'])){
   $user_id =$_SESSION['user_id'];
}else{
   $user_id = '';
}*/
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
include 'component/add_cart.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   
   
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <!--header start--> 
   <?php include 'component/user_header.php' ?>
  
 <!--hero section start-->
 <section class="hero">
   <div class="swiper hero-slider">
      <div class="swiper-wrapper">
         <div class="swiper-slide slide">
            <div class="content">
               <span>order online</span>
               <h3>delicious pizza</h3>
               <p>"Taste the difference! Our pizzas are a symphony of flavors that will leave you craving for more."</p>
               <a href="menu.php" class="btn">see menu</a>
               </div>
               <div class="image">
                  <img src="images/home-img-1.png">
               </div>
            </div>
         

         <div class="swiper-slide slide">
            <div class="content">
               <span>order online</span>
               <h3> hamburguer</h3>
               <p>"Elevate your burger experience! Quality ingredients, unforgettable taste! "</p>
               <a href="menu.html" class="btn">see menu</a>
               </div>
               <div class="image">
                  <img src="images/home-img-2.png">
               </div>
            </div>
         

         <div class="swiper-slide slide">
            <div class="content">
               <span>order online</span>
               <h3>roasted chicken</h3>
               <p>"Discover culinary bliss with our roasted chicken—where quality meets flavor, and every bite is a celebration!"</p>
               <a href="menu.html" class="btn">see menu</a>
               </div>
               <div class="image">
                  <img src="images/home-img-3.png">
               </div>
            </div>
      

      </div>
      <div class="swiper-pagination"></div>
   </div>
 </section> 
 <!--hero section end-->
<!--category start-->
<div class="color">
<selection class="category">
   <h1 class="title">food category</h1>
   <div class="box-container">
      <a href="category.php?category=fast food" class="box">
         <img src="images/cat-1.png">
         <h3>fast food</h3>
      </a>

      
      <a href="category.php?category=main dish" class="box">
         <img src="images/cat-2.png">
         <h3>main dishes</h3>
      </a>

      <a href="category.php?category=drinks" class="box">
         <img src="images/cat-3.png">
         <h3>drinks</h3>
      </a>

     
      <a href="category.php?category=desserts" class="box">
         <img src="images/cat-4.png">
         <h3>dessert</h3>
      </a>
   </div>

</selection> 
<!--category end-->
 <section class="product">
   <h1 class="title">latest dishes </h1>
   <div class="box-container1">
      <?php
      $select_products =$conn->prepare("SELECT * FROM `products`LIMIT 8");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){

        

      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="name" value="<?=$fetch_products['name'];?>">
         <input type="hidden" name="price" value="<?=$fetch_products['price'];?>">
         <input type="hidden" name="image" value="<?=$fetch_products['image'];?>">
         <a href="quick_view.php?pid=<?=$fetch_products['id'];?>"class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?=$fetch_products['image'];?>" alt="">
         <a href="category.php?category=<?=$fetch_products['category'];?>"
          class="cat"><?=$fetch_products['category'];?></a>
          <div class="name"><?=$fetch_products['name'];?></div>
          <div class="flex">
            <div class="price"><span>Rs.</span><?=$fetch_products['price'];?></div>
            
         </div>

         </form>
      <?php
       }
      }else{
             echo'<div class="empty">no product added yet!</div>';
      }
      ?>
      
   </div>      

<div class="more-btn">
   <a href="menu.php" class="btn">view all</a>
   </div>
</section> 


<!--latest product end-->
<!--review section start-->
<section class="review">
   <h1 class="title">customer's feedback</h1>
   <div class="swiper review-slider">
   
      <div class="swiper-wrapper">
         <div class="swiper-slide slide">
            <img src="images/pic-1.png">
            <p>"Smooth ordering process, quick delivery, and the food was delicious. Will definitely order again."</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-2.png">
            <p>"The food arrived hot and fresh! Excellent service and delicious meals. Will definitely order again soon."</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>mandi zen</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-3.png">
            <p>"Amazing experience! Fast delivery and the food was delicious. Will surely order again"</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Nipun Weerasinghe</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-4.png">
            <p>"Ordering was a breeze, and the food was delivered in perfect condition. A+ for the entire experience.""</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Tharu waranagana</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-5.png">
            <p>"Easy to order, fast delivery, and delicious food. What more could you ask for? Highly recommended!"</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Kanishka perea</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-6.png">
            <p>"Quick delivery and tasty food! The app is very easy to use. Would definitely recommend to friends"</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Fathi Zafa</h3>
         </div>
         
         <div class="swiper-slide slide">
            <img src="images/pic-3.png">
            <p>"I appreciate the ease of ordering and the timely delivery. The food was excellent too. Thank you!"</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Ahamad Ammar</h3>
         </div>
         
         <div class="swiper-slide slide">
            <img src="images/pic-5.png">
            <p>"The food was tasty, but the delivery took a bit longer than expected. Still, a good experience."</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Gayan Rathnasekara</h3>
         </div>
      </div>

      <div class="swiper-pagination"></div>
   </div>
</section>
<!--review section end-->



<!--js link-->
<script src="js/script.js"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
<script>
   var swiper = new Swiper(".review-slider", {
      loop: true,
      grabCursor: true,
      spaceBetween: 20,
      autoplay: {
         delay: 4000, // Adjust the delay (in milliseconds) as needed
         disableOnInteraction: false,
      },
      pagination: {
         el: ".swiper-pagination",
         clickable: true,
      },
      breakpoints: {
         550: {
            slidesPerView: 1,
         },
         768: {
            slidesPerView: 2,
         },
         1024: {
            slidesPerView: 3,
         },
      },
   });
</script>


<!--footer start-->
<?php include 'component/footer.php'; ?>
   <!--footer end-->
   </div>


   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
<script>
   var swiper = new Swiper(".hero-slider", {
      loop: true,
      grabCursor: true,
      effect: "slider",
      speed: 800,
      autoplay: {
         delay: 5000, // Delay between slides in milliseconds (3 seconds)
         disableOnInteraction: false, // Continue autoplay after interaction
      },
      pagination: {
         el: ".swiper-pagination",
         clickable: true,
      },
   });
</script>
</body>
</html> 