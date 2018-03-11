<?php

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$JMENO = mysqli_real_escape_string($conn, $_POST['JMENO']);
	$PRIJMENI = mysqli_real_escape_string($conn, $_POST['PRIJMENI']);
	$EMAIL = mysqli_real_escape_string($conn, $_POST['EMAIL']);
	$HESLO = mysqli_real_escape_string($conn, $_POST['HESLO']);
	
	//Error handlers
	//check empty fields
	if (empty($JMENO) || empty($PRIJMENI) || empty($HESLO) || empty($EMAIL)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		//kontrola charu
		if (!preg_match("/^[a-zA-Z]*$/", $JMENO) || !preg_match("/^[a-zA-Z]*$/", $PRIJMENI)) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else {
			//kontrola EMAILu
			if (!filter_var($EMAIL, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=EMAIL");
				exit();
			} else {
				$sql = "SELECT * FROM uzivatel WHERE EMAIL = 'EMAIL'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=usertaken");
					exit();
				} else {
					//hashing heslo
					$hashedHeslo = password_hash($HESLO, PASSWORD_DEFAULT);
					//Vlozeni do databaze
					$sql = "INSERT INTO uzivatel (JMENO, PRIJMENI, EMAIL, HESLO) VALUES ('$JMENO', '$PRIJMENI', '$EMAIL', '$hashedHeslo');";
					mysqli_query($conn, $sql);
					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}

} else {
	header("Location: ../signup.php");
	exit();
}