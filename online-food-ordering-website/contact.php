<?php
include 'component/connect.php';
session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if(isset($_POST['submit'])){
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $number = isset($_POST['number']) ? $_POST['number'] : '';
    $msg = isset($_POST['message']) ? $_POST['message'] : '';

    // Check if the message already exists in the database
    $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name=? AND email=? AND number=? AND message=?");
    $select_message->execute([$name, $email, $number, $msg]);

    if($select_message->rowCount() == 0){
        // If the message doesn't exist, insert it into the database
        $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES (?, ?, ?, ?, ?)");
        $insert_message->execute([$user_id, $name, $email, $number, $msg]);
        $message[] = 'Message sent successfully!';
    } else {
        $message[] = 'Message already sent!';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <!--header start--> 
   
   <?php include 'component/user_header.php' ?>
   <div class="heading">
      <h3>Contact us</h3>
      <p><a href="home.php">home</a>,<span> / contact</span></p>
   </div>
   <!--header end--> 
    
   <!--contact section statrt-->
<div class="color">
   <section class="contact">
      <div class="row">
         <div class="image">
            <img src="images/contact-img.svg">
</div>
<form action="" method="POST">
   <h1>tell us something !</h1>
   <input type="text" required placeholder="enter your name"
    class="box" name="name" maxlength="50">
    <input type="email" required placeholder="enter your email"
    class="box" name="email" maxlength="50">
    <input type="number" required placeholder="enter your number"
    class="box" name="number" maxlength="10" min="0" max="9999999999">
    <textarea name="message" class="box" required maxlength="500" 
    cols="30" rows="10" placeholder="enter your message"></textarea>
    <input type="submit" value="send message" class="btn" name="submit">
    
</form>
</div>

   




</section>
</div>

   <!--contact section end-->


   <!--footer start-->
   <?php include 'component/footer.php'; ?>
   <!--footer end-->






   <!--js link-->
   <script src="js/script.js"></script>
</body>
</html>