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

        <section class="description">
        <div style="font-size:20px;color:white;position:relative;right:200px;">
            <h2>Welcomeee to Virtu-Learn</h2>
        </div>
        <div style="margin-top:10px;position:relative;right:200px;width:1340px;">
            <p>At Virtu-Learn, we are passionate about empowering individuals through education. Our mission is to provide innovative, engaging, and personalized learning experiences that cater to learners from all walks of life. With a wide variety of courses, from beginner to advanced levels, we ensure that there is something for everyone. Whether you're looking to learn a new skill, enhance your professional development, or simply expand your knowledge, our platform is designed to support your growth. Join us on this exciting educational journey, and together, let’s unlock your full potential and achieve your goals!</p>
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

            <div style="position:relative;right:5%;margin-top:50px;" class="more-btn">
                <a href="course.php" class="inline-option-btn">View More</a>
            </div>
        </section>

        <script src="js/script.js"></script>

</body>

</html>