<?php
session_start();
if (isset($_POST['ID_songToDelete'])) {
	include_once 'dbh.inc.php';

	$ID_pisen=$_POST['ID_songToDelete'];

	$sql = "UPDATE hudba SET STAV = 1 WHERE hudba.ID_HUDBA = ".$ID_pisen."";

	mysqli_query($conn, $sql);

	header("Location: ../databaze.php?IDpisne=".$ID_pisne."");
	exit();
}
else {
	header("Location: ../databaze.php");
	exit();
}