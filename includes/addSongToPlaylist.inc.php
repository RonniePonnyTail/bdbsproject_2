<?php
if (isset($_POST['ID_song'])) {

	include_once 'dbh.inc.php';
	include '../editPlaylist.php';

	$ID_pisen=$_POST['ID_song'];

	$sql = "INSERT INTO playlist (ID_CD, ID_HUDBA) VALUES (".$_SESSION['p_ID_CD'].", ".$ID_pisen.");";

	mysqli_query($conn, $sql);

	header("Location: ../editPlaylist.php?songAdded");
	exit();
}
else {
	header("Location: ../editPlaylist.php");
	exit();
}