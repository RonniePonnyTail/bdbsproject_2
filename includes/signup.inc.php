<?php

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';
	$JMENO = mysqli_real_escape_string($conn,$_POST['JMENO']);
	$PRIJMENI = mysqli_real_escape_string($conn,$_POST['PRIJMENI']);
	$LOGIN_EMAIL = mysqli_real_escape_string($conn,$_POST['LOGIN_EMAIL']);
	$HESLO = mysqli_real_escape_string($conn,$_POST['HESLO']);

	//Error handlers
	//check empty fields
	if ($_POST['PREMIUM'] == 'PREMIUM_UCET'){
		$STAV = 1;
	}else{
		$STAV = 2;
	}
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
				$sql = "SELECT * FROM uzivatel WHERE LOGIN_EMAIL = '$LOGIN_EMAIL'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=usertaken");
					exit();
				} else {
					//hashing heslo
					$hashedHeslo = password_hash($HESLO, PASSWORD_DEFAULT);
					//Vlozeni do databaze
					$sql = "INSERT INTO uzivatel (JMENO, PRIJMENI, LOGIN_EMAIL, HESLO, STAV) VALUES ('$JMENO', '$PRIJMENI', '$LOGIN_EMAIL', '$hashedHeslo', '$STAV');";
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
