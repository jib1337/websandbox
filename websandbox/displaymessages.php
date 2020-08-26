<?php

$messageowner = "";
$messagetext  = "";
$row = "";

$db = @mysqli_connect('localhost', 'root', '', 'registration');

if (!$db) {
				// In the docker container
        $db = @mysqli_connect('mysql', 'root', '', 'registration'); 
}

$query = "SELECT message, fromuser, image FROM messages";
$messages = mysqli_query($db, $query);

$num = mysqli_num_rows($messages);
echo '<h2>Total messages: ' , $num, '</h2>';

while ($row = mysqli_fetch_row($messages)) {
	echo '<div class="message">';
	echo '<div class="messageheader">From: ', $row[1], '</div>';
	echo '<div class="messagemain">', $row[0], '</div>';

	if (!(is_null($row[2]))) {
		echo '<div class="messagemain"><img src="uploads/'.$row[2].'"</img></div>';
	}
	echo '</div>';
}

mysqli_close($db);

?>
