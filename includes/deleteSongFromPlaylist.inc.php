<?php
if (isset($_POST['ID_songDelete'])) {

	include_once 'dbh.inc.php';
	include '../showPlaylist.php';

	$ID_pisen=$_POST['ID_songDelete'];

	$sql = "DELETE FROM playlist  WHERE ID_CD = ".$_SESSION['p_ID_CD']." AND ID_HUDBA = ".$ID_pisen.";";

	mysqli_query($conn, $sql);

	header("Location: ../showPlaylist.php?IDpisne=".$ID_pisne."IDcd='".$_SESSION['p_ID_CD']."'");
	exit();
}
else {
	header("Location: ../showPlaylist.php");
	exit();
}