<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style2.css">    
</head>
<body>
    
    
    <div class="carousel">
        <a class="carousel-item" href="#">
            <div class="testi">
                <div class="img-area">
                    <img src="images/pic-1.png">
                </div>
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus veritatis repellendus delectus, est, alias recusandae."</p>
                <h4>Jessica Jones</h4>
                
            </div>
        </a>
        <a class="carousel-item" href="#">
            <div class="testi">
                <div class="img-area">
                    <img src="images/pic-2.png">
                </div>
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus veritatis repellendus delectus, est, alias recusandae."</p>
                <h4>Jessica Jones</h4>
                
            </div>
        </a>
        <a class="carousel-item" href="#">
            <div class="testi">
                <div class="img-area">
                    <img src="images/pic-3.png">
                </div>
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus veritatis repellendus delectus, est, alias recusandae."</p>
                <h4>Jessica Jones</h4>
                
            </div>
        </a>
        <a class="carousel-item" href="#">
            <div class="testi">
                <div class="img-area">
                    <img src="images/pic-4.png">
                </div>
                <p>"Effortless ordering process, timely delivery, and mouthwatering meals.
                Highly recommend this online food ordering website for a hassle-free dining experience!"</p>
                <h4>Jessica Jones</h4>
               
            </div>
        </a>
        <a class="carousel-item" href="#">
            <div class="testi">
                <div class="img-area">
                    <img src="images/pic-5.png">
                </div>
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus veritatis repellendus delectus, est, alias recusandae."</p>
                <h4>Jessica Jones</h4>
               
            </div>
        </a>
      
   </div>

    
    
    
    <script
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
  $(document).ready(function(){
    $('.carousel').carousel({
			padding: 200
	});
	autoplay();
	function autoplay() {
		$('.carousel').carousel('next');
		setTimeout(autoplay, 4500);
	}
  });
</script>
</body>
</html>