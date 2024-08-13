<?php

include 'component/connect.php';

//session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'component/add_cart.php';

if(isset($_GET['category'])){
   $category = $_GET['category'];
}else{
   $category = ''; // Default category or handle the case where no category is provided
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>category</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'component/user_header.php'; ?>

<section class="product">
   <h1 class="title">Food category </h1>
   <div class="box-container1">
      <?php
      $select_products =$conn->prepare("SELECT * FROM `products` WHERE category = ?");
      $select_products->execute([$category]);
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
      
         

<div class="more-btn">
   <a href="menu.html" class="btn">view all</a>
</div>
</section> 

<?php include 'component/footer.php'; ?>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>