<?php
session_start();
if (isset($_POST['ID_song'])) {

	include_once 'dbh.inc.php';

	$ID_pisen=$_POST['ID_song'];

	$sql = "SELECT * FROM hudba JOIN playlist ON hudba.ID_HUDBA = playlist.ID_HUDBA WHERE playlist.ID_CD = ".$_SESSION['p_ID_CD']." AND playlist.ID_HUDBA = ".$ID_pisen."";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck > 0) 
	{
		header("Location: ../editPlaylist.php?addedSong=alreadyInserted");
		exit();
	} else
	{
		$sql = "INSERT INTO playlist (ID_CD, ID_HUDBA) VALUES (".$_SESSION['p_ID_CD'].", ".$ID_pisen.");";
		mysqli_query($conn, $sql);
		header("Location: ../editPlaylist.php?addedSong=good");
		exit();
	}	
}else {
	header("Location: ../editPlaylist.php");
	exit();
}