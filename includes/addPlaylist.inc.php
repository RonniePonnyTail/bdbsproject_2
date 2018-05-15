<?php
session_start();
if (isset($_POST['createPlaylist'])) {
	
	include_once 'dbh.inc.php';

	$Nazev = mysqli_real_escape_string($conn, $_POST['nazev']);
	$Popis = mysqli_real_escape_string($conn, $_POST['popis']);
	$UserID = $_SESSION['u_ID'];

	//Error handlers
	//check empty fields
	if (empty($Nazev)) {
		header("Location: ../addPlaylist.php?addPlaylist=empty");
		exit();
	} else {
			$sql = "SELECT * FROM cd WHERE NAZEV = '$Nazev' AND ID_UZIV = '$UserID'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck > 0) {
				header("Location: ../addPlaylist.php?addPlaylist=playlistreadyexists&addedSong=ready");
				exit();
			} else {
				//Vlozeni do databaze
				$sql = "INSERT INTO cd (ID_UZIV, NAZEV, POPIS) VALUES ('$UserID', '$Nazev', '$Popis');";
				mysqli_query($conn, $sql);

				$sql = "SELECT * FROM cd WHERE NAZEV = '$Nazev'";

				$result = mysqli_query($conn, $sql);

				$row = mysqli_fetch_assoc($result);

				$_SESSION['p_NAZEV'] = $row['NAZEV'];
				$_SESSION['p_POPIS'] = $row['POPIS'];
				$_SESSION['p_ID_CD'] = $row['ID_CD'];
				header("Location: ../editPlaylist.php?addPlaylist=success&addedSong=ready");
				exit();
			}
		}
	}
	else {
	header("Location: ../playlist.php");
	exit();
}