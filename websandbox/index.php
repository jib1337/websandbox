<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to my site</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h2>The unhackable website</h2>
</div>
<div class="content">
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome<strong><?php echo $_SESSION['username']; ?></strong></p>
    <?php endif ?>
    <?php  if ($_SESSION['admin'] == 'true') : ?>
      <p><strong>You are an admin</strong></p>
      <form method="get" action="index.php">
        <button type="submit" class="btn" name="adminpanel">Admin Panel</button>
      </form>
    <?php endif ?>
    <?php  if (isset($_SESSION['username'])) : ?>
      <form method="get" action="addcomment.php">
        <button type="submit" class="btn" name="comment">Post Comment</button>
      </form>
      <form method="get" action="index.php?logout='1'">
        <button type="submit" class="btn" name="logout">Logout</button>
      </form>
    <?php endif ?>
</div>
<div class="header"><h2>Comments</h2></div>
<div class="content">
  <?php include('displaycomments.php') ?>
</div>
</body>
</html>