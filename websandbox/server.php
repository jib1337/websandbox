<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$admin    = "";
$comments = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// Register User
if (isset($_POST['reg_user'])) {
  // Receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $admin = mysqli_real_escape_string($db, $_POST['admin']);

  // Form validation
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }

  // Check for duplicates
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";

  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // User exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);

    $query = "INSERT INTO users (username, email, password, admin) 
          VALUES('$username', '$email', '$password', '$admin')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    $_SESSION['admin'] = $admin;
    header('location: index.php');
  }
}

// User Login
if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";

      $row = mysqli_fetch_row($results);
      $_SESSION['admin'] = $row[4];

      header('location: index.php');

    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

// Post Comment
if (isset($_POST['post_comment'])) {

  // Receive all input values from the form
  $comment = $_POST['comment'];
  $username = mysqli_real_escape_string($db, $_POST['from']);

  if (empty($comment)) { array_push($errors, "Comment can't be blank"); }

  if (isset($_POST["upload"])) {
    // image upload stuff
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
      $uploadOk = 1;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        array_push($errors, "The file already exists.");
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        array_push($errors, "Your file is too large.");
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if (count($errors) != 0) {
        array_push($errors, "Your file was not uploaded.");

    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $_SESSION['success'] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $image = basename($_FILES["fileToUpload"]["name"]);
        } else {
            array_push($errors, "There was an error uploading your file.");
        }
    }
  }

  // Add the comment
  if (count($errors) == 0) {

    if (isset($_POST["upload"])) {
      $query = "INSERT INTO comments (comment, fromuser, image) VALUES ('$comment', '$username', '". basename( $_FILES["fileToUpload"]["name"]). "')";
    } else {
      $query = "INSERT INTO comments (comment, fromuser) VALUES ('$comment', '$username')";
    }
    mysqli_query($db, $query);
    $_SESSION['success'] = "Comment Posted";

    header('location: index.php');
  }
}

?>
