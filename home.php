<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'header.php'; ?> <

    <div class="carousel-container">
    <div class="carousel-left">
        <div class="slide active">
            <img src="Images/carousel1.png" alt="First Slide Image">
        </div>
        <div class="slide inactive">
            <img src="Images/carousel2.png" alt="Second Slide Image">
        </div>
    </div>

    <div class="carousel-right">
        <div class="slide active">
            
            <div style="position:relative;top:50px;">
                <p>At Virtu-Learn, we believe that every individual has the right to a unique, engaging, and enriching educational experience. Our mission is to create personalized learning pathways that are thoughtfully designed to meet the needs of learners from all walks of life, regardless of age, background, or skill level.</p>
                <br>
                <p>By focusing on flexibility, inclusivity, and continuous growth, we are committed to empowering learners to thrive at every step of their educational pursuits, equipping them with the tools and knowledge they need for success in an ever-evolving world.</p>
            </div>
        </div>

        <div class="slide inactive">
            
            <div style="position:relative;top:50px;">
                <p>We offer a wide variety of courses and learning materials aimed at making education exciting and accessible. Whether you're a high school student getting ready for important exams, a professional looking to learn new skills, or someone simply curious about the world, we've got something for you.</p>
                <br>
                <p>Our experienced educators are here to help you succeed, providing support and guidance every step of the way. Learning with us is not just about gaining knowledge—it's about enjoying the journey too.</p>
            </div>
        </div>
    </div>
</div>
    </section>

        <section class="courses">
            <div style="position:relative;right:200px;width:1350px;">
                <h1 class="heading">Available Courses</h1>
            </div>


            <div class="box-container">
                <?php

                $select_courses = $conn->prepare("SELECT * FROM `course` ORDER BY courseID ASC LIMIT 6");
                $select_courses->execute();
                $result = $select_courses->get_result();

                if ($result->num_rows > 0) {
                    while ($fetch_course = $result->fetch_assoc()) {

                        $select_tutor = $conn->prepare("SELECT * FROM `tutor` WHERE tutorID = ?");
                        $select_tutor->bind_param("i", $fetch_course['tutorID']);
                        $select_tutor->execute();
                        $tutor_result = $select_tutor->get_result();
                        $fetch_tutor = $tutor_result->fetch_assoc();
                ?>
                        <div class="box">

                            <div class="image-container">
                                <img src="<?= htmlspecialchars($fetch_course['image_link']); ?>" alt="<?= htmlspecialchars($fetch_course['courseName']); ?>" style="max-width: 100%; height: auto;">
                            </div>
                            <h3 class="title"><?= htmlspecialchars($fetch_course['courseName']); ?></h3>
                            <p class="description"><?= htmlspecialchars($fetch_course['description']); ?></p>
                            <a href="playlist.php?get_id=<?= htmlspecialchars($fetch_course['courseID']); ?>" class="inline-btn">View Playlist</a>
                        </div>
                <?php
                    }
                } else {
                    echo '<p class="empty">No courses added yet!</p>';
                }
                ?>
            </div>

            <div style="position:relative;right:10%;margin-top:50px;" class="more-btn">
                <a href="course.php" class="inline-option-btn">View More</a>
            </div>
        </section>

        <script src="script.js"></script>
    </body>

</html>