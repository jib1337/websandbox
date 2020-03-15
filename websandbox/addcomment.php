<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome to my forum</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Add Comment</h2>
  </div>
<div class="content">
  <form method="post" action="addcomment.php" enctype='multipart/form-data'>
    <div class="input-group">
      <label>Comment</label>
      <input type="text" name="comment"  style="font-size: 25px" value="<?php echo $comment; ?>">
      <input type="hidden" name="from" value="<?php echo $_SESSION['username']; ?>"/>
        <label><input type="checkbox" id="upload" style="float:left; width:auto; padding-left:50px" name="upload" value="Y">
        Upload an image</label>
      <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <br>
      <button type="submit" class="btn" name="post_comment">Post Comment</button>
  </form>
    <a href="index.php">
      <button type="submit" class="btn" name="go_back">Back</button>
    </a>
</form>
</div>

</body>
</html>

</div>
</body>
</html>
