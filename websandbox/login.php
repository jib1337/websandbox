<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome to my forum</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Welcome to my forum</h2>
  </div>
<div class="content">
  <?php include('errors.php'); ?>
  <form method="post" action="login.php">
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" style="font-size: 25px" >
    </div>

    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" style="font-size: 25px" >
    </div>
      <br>
    <button type="submit" class="btn" name="login_user">Login</button>
  </form>
  <form method="get" action="register.php">
    <button type="submit" class="btn" name="register">Sign Up</button>
  </form>
</div>
<div class="content"><h3><a href="about.php?version=1%2e2">About</a></h3></div>
</body>
</html>
