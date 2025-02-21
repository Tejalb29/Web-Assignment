<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $review = filter_var($_POST['review'], FILTER_SANITIZE_STRING);
    $rating = filter_var($_POST['rating'], FILTER_VALIDATE_INT);

    if (empty($username) || empty($review) || empty($rating)) {
        echo "<script>alert('Please fill in all required fields.');</script>";
    } else {
        $query = "SELECT feedbackID FROM feedback ORDER BY feedbackID DESC LIMIT 1";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $lastFeedbackID = $row['feedbackID'];
            
            $lastNumericID = (int) substr($lastFeedbackID, 1);
            $newNumericID = str_pad($lastNumericID + 1, 3, '0', STR_PAD_LEFT);
            $feedbackID = 'F' . $newNumericID;
        } else {
            $feedbackID = 'F001';
        }

        $stmt = $conn->prepare("INSERT INTO feedback (feedbackID, username, review, rating) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $feedbackID, $username, $review, $rating);
        
        if ($stmt->execute()) {
            echo "<script>
                    alert('Feedback submitted successfully!');
                    window.location.href = 'home.php';
                  </script>";
        } else {
            echo "<script>alert('Failed to submit feedback. Please try again.');</script>";
        }
        
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Feedback</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.php'; ?>


<section class="account-form">
    <form action="" method="post">
        <h3>Post Your Feedback</h3>
        <p class="placeholder">Username <span>*</span></p>
        <input type="text" name="username" class="box" placeholder="Enter your username" maxlength="40" required>
        <p class="placeholder">Feedback Review <span>*</span></p>
        <textarea name="review" class="box" placeholder="Enter your feedback" maxlength="1000" required></textarea>
        <p class="placeholder">Rating <span>*</span></p>
        <select name="rating" class="box" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <input type="submit" value="Submit Feedback" name="submit" class="btn">
    </form>
</section>

<script src="js/script.js"></script>

</body>
</html>