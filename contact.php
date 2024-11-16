<?php
// Database configuration
$servername = "localhost";   // Usually localhost for local server
$username = "root";          // Your MySQL username (default: root)
$password = "";              // Your MySQL password (default: empty for localhost)
$dbname = "portfoilio";       // The database you created in phpMyAdmin

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $msg = $_POST['msg'];

  // Sanitize input to prevent SQL injection
  $name = $conn->real_escape_string($name);
  $email = $conn->real_escape_string($email);
  $message = $conn->real_escape_string($message);
  $msg = $conn->real_escape_string($msg);

  // Insert data into the database
  $sql = "INSERT INTO submit (name, email, message, msg) VALUES ('$name', '$email', '$message', '$msg')";

  if ($conn->query($sql) === TRUE) {
    echo "Record send successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close connection
  $conn->close();
}
