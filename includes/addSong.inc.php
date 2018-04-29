<?php

if (isset($_POST['submitSong'])) {
	
	include_once 'dbh.inc.php';

	$Kapela = mysqli_real_escape_string($conn, $_POST['kapela']);
	$Album = mysqli_real_escape_string($conn, $_POST['album']);
	$Pisen = mysqli_real_escape_string($conn, $_POST['pisen']);
	$Delka = mysqli_real_escape_string($conn, $_POST['delka']);
	//$UserID = mysqli_real_escape_string($conn, $_POST['ID_PU']);
	$UserID = $_SESSION['u_ID'];
	//Error handlers
	//check empty fields
	if (empty($Kapela) || empty($Album) || empty($Pisen) || empty($Delka)) {
		header("Location: ../databaze.php?addSong=empty");
		exit();
	} else {
			$sql = "SELECT * FROM hudba WHERE PISEN = '$Pisen'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck > 0) {
				header("Location: ../databaze.php?databaze=songalreadyexists");
				exit();
			} else {
				//Vlozeni do databaze
				$sql = "INSERT INTO hudba (KAPELA, ALBUM, PISEN, DELKA, ID_PU) VALUES ('$Kapela', '$Album', '$Pisen', '$Delka', '$UserID');";
				mysqli_query($conn, $sql);
				header("Location: ../databaze.php?databaze=success");
				exit();
			}
		}
	}
	else {
	header("Location: ../databaze.php");
	exit();
}