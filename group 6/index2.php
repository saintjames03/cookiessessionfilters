<?php
// Start the session
session_start();

// Set a cookie if not already set
if (!isset($_COOKIE['visited'])) {
  setcookie('visited', '1', time() + (86400 * 30), "/"); // 30 days
}

// Function to sanitize input
function sanitizeInput($data)
{
  return htmlspecialchars(stripslashes(trim($data)));
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = sanitizeInput($_POST['name']);
  $email = sanitizeInput($_POST['email']);
  $message = sanitizeInput($_POST['message']);

  // Store data in session
  $_SESSION['name'] = $name;
  $_SESSION['email'] = $email;
  $_SESSION['message'] = $message;

  // Redirect or process the data (like saving to a database)
  // header("Location: thankyou.php"); // Uncomment to redirect after submission
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grostek:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">
  </head>

  <body>

    <section class="team">
      <div class="center">
        <h1>Our Team</h1>
      </div>
      <div class="team-content">
        <!-- Your team boxes here -->
      </div>
    </section>

    <section class="contact-form">
      <div class="center">
        <h1>Contact Us</h1>
      </div>
      <form id="contactForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit">Send</button>
      </form>
      <div id="formMessage">
        <?php
        // Display a success message after submission
        if (isset($_SESSION['name'])) {
          echo "Thank you, " . $_SESSION['name'] . "! Your message has been sent.";
          // Clear session data
          session_unset();
          session_destroy();
        }
        ?>
      </div>
    </section>

    <script src="script.js"></script>
  </body>

</html>