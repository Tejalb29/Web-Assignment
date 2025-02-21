<?php

include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.php'; ?>

<section class="courses">
    <h1 style="position: relative;right:200px;top:20px;width:1300px;" class="heading">All Courses</h1>
    <div style="position:relative;top:50px;margin-bottom:20px;"class="box-container">
        <?php

        $select_courses = $conn->prepare("SELECT * FROM `course` ORDER BY courseID ASC");
        $select_courses->execute();
        $courses = $select_courses->get_result();

        if ($courses->num_rows > 0) {
            while ($fetch_course = $courses->fetch_assoc()) {

                $select_tutor = $conn->prepare("SELECT * FROM `tutor` WHERE tutorID = ?");
                $select_tutor->bind_param("s", $fetch_course['tutorID']);
                $select_tutor->execute();
                $fetch_tutor = $select_tutor->get_result()->fetch_assoc();
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
</section>

</body>
</html>
