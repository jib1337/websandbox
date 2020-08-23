<!DOCTYPE html>
<html>
<head>
  <title>Welcome to my forum</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>About</h2>
  </div>
  <div class="content">
    <div class="about">
      <?php echo "My web forum version ".$_GET["version"] ?><br><br>
      Thanks for using my web forum software, hope you enjoy =)
    </div>
    <div class="aboutlinks"><a href="index.php">Go back</a></div>
  </div>
</body>
</html>
