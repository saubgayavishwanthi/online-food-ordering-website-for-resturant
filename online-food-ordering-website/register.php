<?php
include 'component/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $name = filter_var($name);
   $email = $_POST['email'];
   $email = filter_var($email);
   $number = $_POST['number'];
   $number = filter_var($number);
   $pass = $_POST['pass'];
   $pass = filter_var($pass);
   $cpass = $_POST['cpass'];
   $cpass = filter_var($cpass);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? OR number = ?");
   $select_user->execute([$email,$number]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);
   
   if($select_user->rowCount() > 0){
      $message[] = 'Email or number already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm password not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(name,email,number,password) VALUES (?,?,?,?)");
         $insert_user->execute([$name,$email,$number,$cpass]);
         $confirm_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
         $confirm_user->execute([$email, $pass]);
         
         $row = $confirm_user->fetch(PDO::FETCH_ASSOC);
         if($confirm_user->rowCount() > 0){
            $_SESSION['user_id'] = $row['id'];
           // header('location:home.php');
            $message[] = 'Registered successfully!';
         }
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <!--header start--> 
   
   <!-- header section starts  -->
   <?php include 'component/user_header.php'; ?>
   <!-- header section ends -->
   <!--header end--> 

   <!--register section start-->
   <div class="color">
   <section class="form-container">
      <form action="" method="POST">
         <h3>Register now</h3>
         <input type="text" name="name" placeholder="Enter your name" maxlength="50" required class="box">
         <input type="text" name="email" placeholder="Enter your email" maxlength="50" required class="box">
         <input type="number" name="number" placeholder="Enter your number" maxlength="10" max="999999999"  min="0" required class="box">
         <input type="password" name="pass" placeholder="Enter your password" maxlength="50" required class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="password" name="cpass" placeholder="Confirm your password" maxlength="50" required class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="submit" value="Register now" name="submit" class="btn">
         <p>Already have an account? <a href="login.php">Login now</a></p>
      </form>
   </section>
   </div>
   <!--register section end-->

   <!--footer start-->
   <?php include 'component/footer.php'; ?>
   <!--footer end-->

   <!--js link-->
   <script src="js/script.js"></script>
</body>
</html>
