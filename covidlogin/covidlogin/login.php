<?php
include_once 'header.php';
include_once 'includes/connection.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>

<form action="includes/login.inc.php" method="post">
  <div class="container">
    <h1>Covid-19 Results Portal Login</h1>
    <p>Enter Login Details Here</p>
    <hr>

	<label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" id="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <hr>

    <button type="submit" class="btn">Login</button>
  </div>
</form>

</body>
</html>