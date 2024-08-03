<?php

include 'component/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
}

if(isset($_POST['delete'])){
   $cart_id = $_POST['cart_id'];
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
   $delete_cart_item->execute([$cart_id]);
   $message[] = 'cart item deleted!';
}

if(isset($_POST['delete_all'])){
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart_item->execute([$user_id]);
   $message[] = 'deleted all from cart!';
}

if(isset($_POST['update_qty'])){
   $cart_id = $_POST['cart_id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty);
   $update_qty = $conn->prepare("UPDATE `cart` SET qty = ? WHERE id = ?");
   $update_qty->execute([$qty, $cart_id]);
   $message[] = 'cart quantity updated';
}

$grand_total = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'component/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>shopping cart</h3>
   <p><a href="home.php">home</a> <span> / cart</span></p>
</div>

<!-- shopping cart section starts  -->

<section class="product2">

   <h1 class="title">your cart</h1>

   <table class="cart-table">
      <thead>
         <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
               $sub_total = $fetch_cart['price'] * $fetch_cart['qty'];
               $grand_total += $sub_total;
         ?>
         <tr>
            <td>
               <form action="" method="post" class="cart-item-form">
                  <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
                  <button type="submit" class="fas fa-times" name="delete" onclick="return confirm('delete this item?');"></button>
                  <img src="uploaded_img/<?= $fetch_cart['image']; ?>" alt="<?= $fetch_cart['name']; ?>">
                  <span><?= $fetch_cart['name']; ?></span>
               </form>
            </td>
            <td><span>$<?= $fetch_cart['price']; ?></span></td>
            <td>
               <form action="" method="post" class="update-qty-form">
                  <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
                  <input type="number" name="qty" class="qty" min="1" max="99" value="<?= $fetch_cart['qty']; ?>" maxlength="2">
                  <button type="submit" class="fas fa-edit" name="update_qty"></button>
               </form>
            </td>
            <td><span>$<?= $sub_total; ?></span></td>
         </tr>
         <?php
            }
         }else{
            echo '<tr><td colspan="4" class="empty">Your cart is empty</td></tr>';
         }
         ?>
      </tbody>
   </table>

   <div class="cart-total">
      <p>cart total : <span>$<?= $grand_total; ?></span></p>
      <a href="checkout.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">proceed to checkout</a>
   </div>

   <div class="more-btn">
      <form action="" method="post">
         <button type="submit" class="delete-btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>" name="delete_all" onclick="return confirm('delete all from cart?');">delete all</button>
      </form>
      <a href="menu.php" class="btn">continue shopping</a>
   </div>

</section>

<!--footer start-->
<?php include 'component/footer.php'; ?>
   <!--footer end-->

<!-- shopping cart section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
