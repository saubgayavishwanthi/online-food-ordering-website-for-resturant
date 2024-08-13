<?php
include 'component/connect.php';
session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
include 'component/add_cart.php';

$sql = "SELECT question, answer FROM FAQ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            font-family:'Rubik',sans-serif;
           
            background-color:#F9F9E4 ;
        }
        .faq-container {
            width:830px;
            height:auto;
            margin: 0 auto;
            padding-right:100px;
            padding-left:100px;
            
            float:right;
        }
        .faq {
            border-bottom: 1px solid #ccc;
            padding: 15px 0;
        }
         h1 {
            font-size:25px;
            padding:50px;
            text-align: center;
           
        }
        .faq h3 {
            cursor: pointer;
            font-size:18px;
            font-weight:420;
           
           
            
        }
        .faq p {
            display: none;
            padding: 20px 0;
            font-size:16px;
            font-weight:400;
           
            margin: 0;
            transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
            overflow: hidden;
            max-height: 0;
            opacity: 0;
           
        }
        .faq p.show {
            display: block;
            max-height: 500px; /* Adjust this value based on your content */
            opacity: 1;
        }
        . faq-image .img {
            width:80px;
            height:auto;
            top: 5;
            position: -webkit-sticky;
            position: sticky;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var faqs = document.querySelectorAll(".faq h3");
            faqs.forEach(function(faq) {
                faq.addEventListener("click", function() {
                    var answer = this.nextElementSibling;
                    if (answer.classList.contains("show")) {
                        answer.classList.remove("show");
                    } else {
                        var allAnswers = document.querySelectorAll(".faq p");
                        allAnswers.forEach(function(a) {
                            a.classList.remove("show");
                        });
                        answer.classList.add("show");
                    }
                });
            });
        });
    </script>
</head>
<body>
   <!--header start--> 
   <?php include 'component/user_header.php' ?>
   <h1>Frequently Asked Questions</h1>
   <div class="faq-image">
    <img src="images/faq1.png" style=" width:500px;">
   
   <div class="faq-container">
  
        <?php
        if (count($faqs) > 0) {
            foreach ($faqs as $row) {
                echo '<div class="faq">';
                echo '<h3>' . htmlspecialchars($row["question"]) . '</h3>';
                echo '<p>' . htmlspecialchars($row["answer"]) . '</p>';
                echo '</div>';
            }
        } else {
            echo "No FAQs found.";
        }
        ?>
    </div>
    <?php include 'component/footer.php'; ?>
</body>
</html>
