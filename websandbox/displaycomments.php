<?php

$commentowner = "";
$commenttext  = "";
$row = "";

$db = mysqli_connect('localhost', 'root', '', 'registration');

$query = "SELECT comment, fromuser, image FROM comments";
$comments = mysqli_query($db, $query);

$num = mysqli_num_rows($comments);
echo '<h2>Total comments: ' , $num, '</h2>';

while($row = mysqli_fetch_row($comments)) {
	echo '<div class="comment">';
	echo '<div class="commentheader">From: ', $row[1], '</div>';
	echo '<div class="commentmain">', $row[0], '</div>';

	if (!(is_null($row[2]))) {
		echo '<div class="commentmain"><img src="uploads/'.$row[2].'"</img></div>';
	}
	echo '</div>';
}

mysqli_close($db);

?>
