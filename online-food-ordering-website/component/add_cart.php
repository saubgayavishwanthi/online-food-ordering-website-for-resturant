<?php

if(isset($_POST['add_to_cart'])){
      
   if($user_id == ''){
      header('location:login.php');
   }else{

     
      $name = $_POST['name'];
      $name = filter_var($name);
      $price = $_POST['price'];
      $price = filter_var($price);
      $image = $_POST['image'];
      $image = filter_var($image);
      $qty = $_POST['qty'];
      $qty = filter_var($qty);
     

      $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
      $check_cart_numbers->execute([$name, $user_id]);

      if($check_cart_numbers->rowCount() > 0){
         $message[] = 'already added to cart!';
      }else{
         $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, name, price,qty, image) VALUES(?,?,?,?,?)");
         $insert_cart->execute([$user_id, $name, $price, $qty, $image]);
         $message[] = 'added to cart!';
         
      }

   }

}

?>