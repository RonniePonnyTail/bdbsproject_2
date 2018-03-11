<?php

session_start();

if (isset($_POST['submit'])) {
	
	include 'dbh.inc.php';

	$EMAIL = mysqli_real_escape_string($conn, $_POST['EMAIL']);
	$HESLO = mysqli_real_escape_string($conn, $_POST['HESLO']);

	//Kontrola vyplneni
	if (empty($EMAIL) || empty($EMAIL)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM uzivatel WHERE EMAIL = '$EMAIL'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error1");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//Dehashing hesla
				$hashedHesloCheck = password_verify($HESLO, $row['HESLO']);
				if ($hashedHesloCheck == false) {
					header("Location: ../index.php?login=error2");
					exit();
				} elseif($hashedHesloCheck == true) {
					//Log in user
					$_SESSION['u_ID'] = $row['ID'];
					$_SESSION['u_EMAIL'] = $row['EMAIL'];
					$_SESSION['u_JMENO'] = $row['JMENO'];
					$_SESSION['u_PRIJMENI'] = $row['PRIJMENI'];
					header("Location: ../index.php?login=success");
					exit();
				}
			}
		}
	}
}else {
	header("Location: ../index.php?login=error3");
	exit();
}