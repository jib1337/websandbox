<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>The Unhackable Website</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>The Unhackable Website</h2>
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
</body>

</html>