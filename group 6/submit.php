<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  $to = 'your-email@example.com'; // Replace with your email address
  $subject = 'Contact Form Submission';
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

  $email_message = "Name: $name\n";
  $email_message .= "Email: $email\n";
  $email_message .= "Message:\n$message\n";

  if (mail($to, $subject, $email_message, $headers)) {
    echo 'Success';
  } else {
    echo 'Error';
  }
}
?>