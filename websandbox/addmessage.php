<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome to my forum</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Post Message</h2>
  </div>
<div class="content">
  <form method="post" action="addmessage.php" enctype='multipart/form-data'>
    <div class="input-group">
      <label>Comment</label>
      <label><textarea type="text" name="message"  style="font-size:25px; width:98%; resize: none; height: 10em;"/></textarea></label>
      <input type="hidden" name="from" value="<?php echo $_SESSION['username']; ?>"/>
        <label><input type="checkbox" id="upload" style="float:left; width:auto; padding-left:50px" name="upload" value="Y">
        Upload an image</label>
      <label><input type="file" name="fileToUpload" id="fileToUpload" style="width:98%;"></label>
    </div>
    <br>
      <button type="submit" class="btn" name="post_message">Post Message</button>
  </form>
    <a href="index.php">
      <button type="submit" class="btn" name="go_back">Back</button>
    </a>
</form>
</div>
</body>
</html>
