<?php

include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'header.php'; ?>


<section class="about">

   <div class="row">

   <div class="image">
         <div class="carousel">
            <div class="carousel-slide">
                <img src="images/sim.png" alt="Sim Image">
            </div>
            <div class="carousel-slide">
                <img src="images/tejal.png" alt="Tejal Image">
            </div>
         </div>
      </div>

      <div class="content">
      <h3>Who are we?</h3>
         <p style="font-size: 16px;width:800px; position:relative;">Hi! We're Tejal and Simtysha, best friends and co-founders of Virtu-Learn, an online course platform designed to make education accessible to everyone. Our mission is to create an engaging learning experience that helps people gain new skills and grow both personally and professionally. Whether you're looking to start a new journey or advance your knowledge, Virtu-Learn is here to support you every step of the way!</p>         
      <br>
      <br>
         <h3>Why choose us?</h3>
         <p style="font-size: 16px;width:800px">Virtu-Learn combines personalized tutoring with expert educators and flexible scheduling to support every learner. Our passionate tutors create engaging learning experiences, making education effective and enjoyable. Whether you need homework help or exam preparation, we provide a safe and supportive environment to help you achieve your academic goals. Unlock your potential with Virtu-Learn!</p>        
          <a href="course.php" class="inline-btn">our courses</a>
      </div>

   </div>

</section>


<section class="reviews">

   <h1 class="heading">Our reviews</h1>

   <div class="box-container">

      <div class="box">
         <p>Virtu-Learn has been a game-changer for my studies! The tutors are knowledgeable and really take the time to understand my learning style.</p>
         <div class="user">
            <div>
               <h3>John</h3>
               <div class="stars">
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>I love the flexibility that Virtu-Learn offers. I can schedule sessions around my busy life and this helps me balance my studies with other commitments.</p>
         <div class="user">
            <div>
               <h3>Sarah</h3>
               <div class="stars">
                  <i class="fas fa-star"  style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star"  style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star"  style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star-half-alt"  style="color:rgb(45, 6, 130);"></i>
                  <i class="fa-regular fa-star" style="color:rgb(45, 6, 130);"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>"Virtu-Learn has excellent resources and supportive tutors. The personalized approach helped me prepare for my exams effectively.</p>
         <div class="user">
            <div>
               <h3>Emily</h3>
               <div class="stars">
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fa-regular fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fa-regular fa-star" style="color:rgb(45, 6, 130);"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>The tutors are friendly and patient, and they really help me understand the material. I feel more prepared for my classes than ever before!</p>
         <div class="user">
            <div>
               <h3>Micheal</h3>
               <div class="stars">
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>"I had a great experience with Virtu-Learn! The personalized tutoring sessions helped me grasp complex concepts easily. I'm very satisfied with my progress!</p>
         <div class="user">
            <div>
               <h3>Sophia</h3>
               <div class="stars">
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fas fa-star" style="color:rgb(45, 6, 130);"></i>
                  <i class="fa-regular fa-star" style="color:rgb(45, 6, 130);"></i>
               </div>
            </div>
         </div>
      </div>

   </div>
   <a href="review.php" class="reviewbtn">Add Review</a>
</section>


<script src="js/script.js"></script>
   <script>
let currentIndex = 0;
const slides = document.querySelectorAll('.carousel-slide');

function showNextSlide() {
    slides[currentIndex].style.transform = 'translateY(-100%)'; 
    currentIndex = (currentIndex + 1) % slides.length;
    slides[currentIndex].style.transform = 'translateY(0)'; 
}

setInterval(showNextSlide, 5000);
</script>
</body>
</html>