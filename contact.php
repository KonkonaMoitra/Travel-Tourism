<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from form
    $name = htmlspecialchars(trim($_POST["name"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $comments = htmlspecialchars(trim($_POST["comments"]));

    // Email details
    $to = "everwildescapes@gmail.com";  // Replace with your email
    $subject = "New Inquiry from $name";
    $message = "
      Name: $name\n
      Phone: $phone\n
      Email: $email\n
      Message:\n$comments
    ";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "<h2>Thank you, $name. Your inquiry has been received.</h2>";
    } else {
        echo "<h2>Sorry, something went wrong. Please try again later.</h2>";
    }
} else {
    echo "<h2>Access Denied!</h2>";
}
?>
