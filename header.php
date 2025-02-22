<?php
include 'connect.php';
?>


<header class="header">

    <section class="flex">
        <!-- Isolated Logo and Text -->
        <div class="logo-container">
            <a href="home.php" class="logo">
                <img src="images/logo.png" alt="a" class="logo-img"> 
                Virtu-Learn
            </a>
        </div>

        <!-- Navbar Links -->
        <nav class="navbar">
            <a href="home.php"><i class="fas fa-home"></i><span> Home</span></a>
            <a href="aboutUs.php"><i class="fas fa-question"></i><span> About Us</span></a>
            <a href="course.php"><i class="fas fa-graduation-cap"></i><span> Courses</span></a>
            <a href="teachers.php"><i class="fas fa-chalkboard-user"></i><span> Teachers</span></a>
            <a href="contact.php"><i class="fas fa-headset"></i><span> Contact Us</span></a>
        </nav>

        <div class="search-container">
            <form action="search_course.php" method="post" class="search-form">
                <input type="text" name="search_course" placeholder="Search courses..." required maxlength="100">
                <button type="submit" class="fas fa-search" name="search_course_btn"></button>
            </form>
        </div>

        <!-- <div class="flex-btn">
            <a href="login.php" class="option-btn">Login</a>
            <a href="register.php" class="option-btn" style="text-align: left;">Register</a>
        </div> -->

        <div class="dropdown">
    <a href="#" class="user-icon fa fa-user"></a>
    <div class="dropdown-content">
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>
</div>

    </section>
</header>

