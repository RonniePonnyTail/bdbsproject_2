<?php
session_start();
if (isset($_POST['ID_userToDelete'])) {
	include_once 'dbh.inc.php';

	$ID_user=$_POST['ID_userToDelete'];

	$sql = "UPDATE uzivatel SET STAV = 0 WHERE uzivatel.ID = ".$ID_user."";

	mysqli_query($conn, $sql);

	header("Location: ../uzivatele.php?IDpisne=".$ID_user."");
	exit();
}
else {
	header("Location: ../uzivatele.php");
	exit();
}