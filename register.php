<?php
require_once 'connect.php'; 

function generate_student_id($conn) {
    $result = $conn->query("SELECT MAX(studentID) AS max_id FROM student");
    $row = $result->fetch_assoc();
    
    $max_id = $row['max_id'];
    if ($max_id) {
        $number = intval(substr($max_id, 1)) + 1; 
    } else {
        $number = 1;
    }
    
    return 'S' . str_pad($number, 3, '0', STR_PAD_LEFT);
}

if (isset($_POST['submit'])) {
    $id = generate_student_id($conn);

    $fname = filter_var(trim($_POST['fname']), FILTER_SANITIZE_STRING);
    $lname = filter_var(trim($_POST['lname']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
    $pnum = filter_var(trim($_POST['pnum']), FILTER_SANITIZE_STRING); 
    $pass = filter_var(trim(sha1($_POST['pass'])), FILTER_SANITIZE_STRING);
    $cpass = filter_var(trim(sha1($_POST['cpass'])), FILTER_SANITIZE_STRING);

    if (!preg_match('/^\d{7}$/', $pnum)) {
        $message[] = 'Phone number must be exactly 7 digits!';
    } else {
        $select_user = $conn->prepare("SELECT * FROM `student` WHERE email = ? OR username = ?");
        $select_user->bind_param("ss", $email, $username);
        $select_user->execute();
        $select_user_result = $select_user->get_result();

        if ($select_user_result->num_rows > 0) {
            $message[] = 'Email or username already taken!';
        } else {
            if ($pass != $cpass) {
                $message[] = 'Confirmation password not matched!';
            } else {
                $insert_user = $conn->prepare("INSERT INTO `student` (studentID, fname, lname, email, username, password, pNum) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $insert_user->bind_param("sssssss", $id, $fname, $lname, $email, $username, $pass, $pnum);
                $insert_user->execute();

                $verify_user = $conn->prepare("SELECT * FROM `student` WHERE email = ? AND password = ? LIMIT 1");
                $verify_user->bind_param("ss", $email, $pass);
                $verify_user->execute();
                $verify_user_result = $verify_user->get_result();

                if ($verify_user_result->num_rows > 0) {
                    $row = $verify_user_result->fetch_assoc();
                    setcookie('studentid', $row['studentID'], time() + 60 * 60 * 24 * 30, '/');
                    header('location:home.php');
                    exit();
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register - Virtu-Learn</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.php'; ?>

<section class="form-container">
   <form class="register" action="" method="post" enctype="multipart/form-data">
      <h3>Register</h3>
      <div class="flex">
         <div class="col">
            <p>Your First Name <span>*</span></p>
            <input type="text" name="fname" placeholder="Enter first name" maxlength="50" required class="box">
            <p>Your Last Name <span>*</span></p>
            <input type="text" name="lname" placeholder="Enter last name" maxlength="50" required class="box">
            <p>Your Email <span>*</span></p>
            <input type="email" name="email" placeholder="Enter your email" maxlength="100" required class="box">
            <p>Your Username <span>*</span></p>
            <input type="text" name="username" placeholder="Enter your username" maxlength="50" required class="box">
            <p>Your Phone Number <span>*</span></p>
            <input type="text" name="pnum" placeholder="Enter your phone number" maxlength="7" required class="box" pattern="\d{7}" title="Phone number must be exactly 7 digits">
         </div>
         <div class="col">
            <p>Your Password <span>*</span></p>
            <input type="password" name="pass" placeholder="Enter your password" maxlength="20" required class="box">
            <p>Confirm Password <span>*</span></p>
            <input type="password" name="cpass" placeholder="Confirm your password" maxlength="20" required class="box">
         </div>
      </div>
      <input type="submit" name="submit" value="Register Now" class="btn">
      <p class="link">Already have an account? <a href="login.php">Login now</a></p>
   </form>
</section>


<script src="js/script.js"></script>
</body>
</html>
