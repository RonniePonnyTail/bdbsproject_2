<?php
session_start();
if (isset($_POST['ID_songToDelete'])) {
	include_once 'dbh.inc.php';

	$ID_pisen=$_POST['ID_songToDelete'];

	$sql = "DELETE FROM playlist WHERE ID_CD = ".$_SESSION['p_ID_CD']." AND ID_HUDBA = ".$ID_pisen."";

	mysqli_query($conn, $sql);

	header("Location: ../editPlaylist.php?addedSong=SongDeleted");
	exit();
}
else {
	header("Location: ../editPlaylist.php?addedSong=Ready");
	exit();
}