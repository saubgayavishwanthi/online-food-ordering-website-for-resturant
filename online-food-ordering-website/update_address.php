<?php

include 'component/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){

   $address = $_POST['home_no'] .', '.$_POST['street'].', '.$_POST['city'].', '.$_POST['district'] .', '. $_POST['province'];

   $address = filter_var($address);

   $update_address = $conn->prepare("UPDATE `users` set address = ? WHERE id = ?");
   $update_address->execute([$address, $user_id]);

   $message[] = 'address saved!';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update address</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'component/user_header.php' ?>

<section class="form-container">

   <form action="" method="post">
      <h3>your address</h3>
      <input type="text" class="box" placeholder="home no" required maxlength="50" name="home_no">
      <input type="text" class="box" placeholder="street name" required maxlength="50" name="street">
      <input type="text" class="box" placeholder="city name" required maxlength="50" name="city">
      <input type="text" class="box" placeholder="district name" required maxlength="50" name="district">
      <input type="text" class="box" placeholder="province name" required maxlength="50" name="province">
      
      <input type="submit" value="save address" name="submit" class="btn">
   </form>

</section>










<?php include 'component/footer.php' ?>







<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>