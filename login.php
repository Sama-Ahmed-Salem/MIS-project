<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: rgb(246, 236, 208);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background-color: black;
      color: white;
      border-radius: 8px;
      padding: 20px;
      width: 300px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .login-container h2 {
      margin-bottom: 20px;
    }

    .login-container form {
      display: flex;
      flex-direction: column;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
      padding: 10px;
      margin-bottom: 15px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
    }

    .login-container input[type="text"] {
      background-color: rgb(255, 211, 91);
      color: black;
    }

    .login-container input[type="password"] {
      background-color: rgb(255, 211, 91);
      color: black;
    }

    .login-container input[type="submit"] {
      padding: 10px;
      background-color: rgb(255, 211, 91);
      color: black;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .login-container input[type="submit"]:hover {
      background-color: rgb(246, 236, 208);
    }

    .login-container a {
      color: rgb(255, 211, 91);
      text-decoration: none;
      margin-top: 10px;
      display: inline-block;
    }

    .login-container a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="login.php" method="POST">
      <input type="text" name="Email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" value="Log In">
    </form>
  </div>
</body>
</html>


<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$dbname = "campuscravinghub";

// Database connection
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Debug $_POST array
    // print_r($_POST);

    // Retrieve and sanitize form inputs
    $email = $conn->real_escape_string($_POST['Email']);
    $password = $conn->real_escape_string($_POST['password']); // Lowercase 'password'

    // Query user by email
    $sql = "SELECT * FROM users WHERE Email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dbPassword = $row['Password']; // Stored hashed password

        // Verify password
        if (password_verify($password, $dbPassword)) {
            // Login successful
            $_SESSION['user_id'] = $row['UserId'];
            $_SESSION['email'] = $row['Email'];

            // Redirect to dashboard
            header("Location: user.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with this email.";
    }
}
$conn->close();
?>


