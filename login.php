<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
</head>
<body>

  <div class="login-box">
    <h2>Login</h2>
    <form action="login.php" method="POST">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>

      <button name="save" class="login-btn" type="submit">Login</button>
    </form>
    <div class="footer-text">
      Don't have an account? <a href="#">Register</a>
    </div>
  </div>

</body>
</html>


<?php
// login.php
if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $username;
    // Here you would typically check the credentials against a database  
    // For demonstration, we'll just check against hardcoded values
    echo $_SESSION['username'];

  
}
 





?>