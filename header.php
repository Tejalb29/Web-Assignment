<?php
include 'connect.php';
?>


<header class="header">

    <section class="flex">
    <a href="home.php" style="font-size: 13px;position:relative;right:230px;top:15px;width:20%;" class="logo">
    <img src="images/logo.png" alt="a" style="height: 70px;width:50px; margin-right: 10px;position:relative;right:20px;bottom:25px;"> 
    Virtu-Learn
</a>

      <nav class="navbar">
    <a href="home.php" style="font-size: 1.4rem;"><i class="fas fa-home"></i><span> Home</span></a>
    <a href="aboutus.php" style="font-size: 1.4rem;"><i class="fas fa-question"></i><span> About Us</span></a>
    <a href="course.php" style="font-size: 1.4rem;"><i class="fas fa-graduation-cap"></i><span> Courses</span></a>
    <a href="teachers.php" style="font-size: 1.4rem;"><i class="fas fa-chalkboard-user"></i><span> Teachers</span></a>
    <a href="contact.php" style="font-size: 1.4rem;"><i class="fas fa-headset"></i><span> Contact Us</span></a>
</nav>

        <div  class="search-container">
         
            <form action="search_course.php" method="post" class="search-form">
                <input style="font-size: 1.5rem;" type="text" name="search_course" placeholder="Search courses..." required maxlength="100">
                <button type="submit" class="fas fa-search" name="search_course_btn"></button>
            </form>
        </div>

        <div class="flex-btn">
            <a href="login.php" class="option-btn">Login</a>
            <a href="register.php" class="option-btn">Register</a>
        </div>
    </section>
</header>
</div>
