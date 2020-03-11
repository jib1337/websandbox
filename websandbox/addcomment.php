<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>The Unhackable Website</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Add Comment</h2>
  </div>
<div class="content">
  <form method="post" action="addcomment.php">
    <div class="input-group">
      <label>Comment</label>
      <input type="text" name="comment"  style="font-size: 25px" value="<?php echo $comment; ?>">
      <input type="hidden" name="from" value="<?php echo $_SESSION['username']; ?>"/>
    </div>
    <br>
      <button type="submit" class="btn" name="post_comment">Post Comment</button>
  </form>
    <a href="index.php">
      <button type="submit" class="btn" name="go_back">Back</button>
    </a>
</div>
</body>
</html>