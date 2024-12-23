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
    <form action="/login" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" value="Log In">
    </form>
    <a href="#">Forgot your password?</a>
  </div>
</body>
</html>
