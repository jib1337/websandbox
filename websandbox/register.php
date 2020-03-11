<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>The Unhackable Website</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Register</h2>
  </div>
  
  <div class="content">

  <form method="post" action="register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" style="font-size: 25px" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" style="font-size: 25px" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" style="font-size: 25px" name="password_1">
    </div>
    <div class="input-group">
      <input type="hidden" name="admin" value="false"/>
    </div>
      <button type="submit" class="btn" name="reg_user">Register</button>
  </form>
  <form method="get" action="login.php">
    <button type="submit" class="btn" name="login">Back To Login</button>
  </form>
</div>
</body>
</html>