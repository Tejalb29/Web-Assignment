<?php
include 'connect.php'; 

if (isset($_POST['submit'])) {

    $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $number = filter_var(trim($_POST['number']), FILTER_SANITIZE_STRING);
    $msg = filter_var(trim($_POST['msg']), FILTER_SANITIZE_STRING);


    $select_contact = $conn->prepare("SELECT * FROM `contact` WHERE username = ? AND email = ? AND number = ? AND message = ?");
    $select_contact->bind_param("ssss", $username, $email, $number, $msg);
    $select_contact->execute();
    $select_contact_result = $select_contact->get_result();

    if ($select_contact_result->num_rows > 0) {
        $message[] = 'Message sent already!';
    } else {

        $insert_message = $conn->prepare("INSERT INTO `contact`(username, email, number, message) VALUES(?, ?, ?, ?)");
        $insert_message->bind_param("ssss", $username, $email, $number, $msg);
        $insert_message->execute();
        

        if ($insert_message->affected_rows > 0) {
            echo "<script>
            alert('Message sent successfully!');
            window.location.href = 'home.php';
          </script>";
} else {
    echo "<script>alert('Failed to send message! Please try again.');</script>";
}
$insert_message->close();
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.php'; ?>

<section class="contact">
    <div class="row">
        <div class="image">
            <img src="images/contactus.png" alt="">
        </div>

        <form action="" method="post">
            <h3>Get in touch</h3>
            <input type="text" placeholder="Enter your username" required maxlength="100" name="username" class="box">
            <input type="email" placeholder="Enter your email" required maxlength="100" name="email" class="box">
            <input type="number" min="0" max="9999999999" placeholder="Enter your number" required maxlength="10" name="number" class="box">
            <textarea name="msg" class="box" placeholder="Enter your message" required cols="30" rows="10" maxlength="1000"></textarea>
            <input type="submit" value="Send message" class="inline-btn" name="submit">
        </form>
    </div>

    <div class="box-container">
        <div class="box">
            <i class="fas fa-phone"></i>
            <h3>Phone number</h3>
            <a href="tel:5749284">58281909</a>
            <a href="tel:5883759">57676983</a>
        </div>

        <div class="box">
            <i class="fas fa-envelope"></i>
            <h3>Email address</h3>
            <a href="mailto:simtysha@gmail.com">becceeasimtysha@gmail.com</a>
            <a href="mailto:tejal@gmail.com">tejalbissessur@gmail.com</a>
        </div>

        <div style="height:200px;"class="box">
            <i class="fas fa-map-marker-alt" style="position:relative;top:-10px;"></i>
            <h3 style="position:relative;top:-30px;">Office address</h3>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3743.791570903154!2d57.472131674860215!3d-20.225980447592764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x217c5ac5969bc80f%3A0x126d0a00c6beee2a!2sRemy%20Ollier%20St%2C%20Beau%20Bassin-Rose%20Hill!5e0!3m2!1sen!2smu!4v1728733817531!5m2!1sen!2smu" 
                width=100%;
                height=60%; 
                style="position: relative;top:-35px;"
                >
            </iframe>        
        </div>
    </div>
</section>

</body>
</html>
