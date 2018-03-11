<?php

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';
	$JMENO = $conn->real_escape_string($_POST['JMENO']);
	$PRIJMENI = $conn->real_escape_string($_POST['PRIJMENI']);
	$LOGIN_EMAIL = $conn->real_escape_string($_POST['LOGIN_EMAIL']);
	$HESLO = $conn->real_escape_string($_POST['HESLO']);
	
	//Error handlers
	//check empty fields
	if (empty($JMENO) || empty($PRIJMENI) || empty($HESLO) || empty($LOGIN_EMAIL)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		//kontrola charu
		if (!preg_match("/^[a-zA-Z]*$/", $JMENO) || !preg_match("/^[a-zA-Z]*$/", $PRIJMENI)) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else {
			//kontrola EMAILu
			if (!filter_var($LOGIN_EMAIL, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=EMAIL");
				exit();
			} else {
				$sql = "SELECT * FROM uzivatel WHERE LOGIN_EMAIL = 'LOGIN_EMAIL'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=usertaken");
					exit();
				} else {
					//hashing heslo
					$hashedHeslo = password_hash($HESLO, PASSWORD_DEFAULT);
					//Vlozeni do databaze
					$sql = "INSERT INTO uzivatel (JMENO, PRIJMENI, LOGIN_EMAIL, HESLO) VALUES ('$JMENO', '$PRIJMENI', '$LOGIN_EMAIL', '$hashedHeslo');";
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
