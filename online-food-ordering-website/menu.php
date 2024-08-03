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
    <title>  Menu</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <!--header start--> 
   <?php include 'component/user_header.php' ?>
   
   <!--header end--> 
   <div class="heading">
      <h3>our menu</h3>
      <p><a href="home.php">home</a>,<span> / Menu</span></p>
   </div>

   <!-- menu section starts  -->
<div class="color">
   <section class="product">
   <h1 class="title">latest dishes </h1>
   <div class="box-container1">
      <?php
      $select_products =$conn->prepare("SELECT * FROM `products`");
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
            <input type="number" name="qty" class="qty" value="1" min="1" max="99" maxlength="2">
         </div>

         </form>
      <?php
       }
      }else{
             echo'<div class="empty">no product added yet!</div>';
      }
      ?>

</div>

</section>

</div>
   </body>
   </html>