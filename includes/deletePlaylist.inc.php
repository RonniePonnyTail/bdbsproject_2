<?php
session_start();
if (isset($_POST['ID_playlistToDelete'])) {
	include_once 'dbh.inc.php';

	$ID_cd=$_POST['ID_playlistToDelete'];

	$sql = "UPDATE cd SET STAV = 1 WHERE cd.ID_CD = ".$ID_cd."";

	mysqli_query($conn, $sql);

	header("Location: ../browsePlaylist.php?IDpisne=".$ID_cd."");
	exit();
}
else {
	header("Location: ../browsePlaylist.php");
	exit();
}