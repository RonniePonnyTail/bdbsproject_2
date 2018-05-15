<?php
session_start();
if (isset($_POST['ID_playlist'])) {

	include_once 'dbh.inc.php';

	$_SESSION['p_ID_CD'] = $_POST['ID_playlist'];
	$sql = "SELECT * FROM cd WHERE ID_CD = ".$_SESSION['p_ID_CD']."";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				$_SESSION['p_NAZEV'] = $row['NAZEV'];
				$_SESSION['p_POPIS'] = $row['POPIS'];
	header("Location: ../showPlaylist.php?pridano");
	exit();
}
else {
	header("Location: ../browsePlaylist.php");
	exit();
}