<?php
include_once 'header.php';
?>
<script>
function VyplnUdajePopUp()
{
alert("Nebyly vyplneny vsechny udaje");
}

function AlreadyExists()
{
alert("Uzivatel uz existuje");
}

function ValidateEmail()
{
alert("Prosim zadejte platny email");
}

function SignupSuccess()
{
alert("Byl jste uspesne zaregistrovan");
}
</script>

<?php 
	if ($_GET['signup'] == 'empty') {
		echo '<script>VyplnUdajePopUp()</script>';
	}
	if ($_GET['signup'] == 'ValidateEmail') {
		echo '<script>ValidateEmail()</script>';
	}
	if ($_GET['signup'] == 'success') {
		echo '<script>SignupSuccess()</script>';
	}
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Registrace</h2>
		<hr width="100%" color="red">
		<p align="center">*Vsechny udaje jsou povinne</p>
		<form class ="signup-form" action="includes/signup.inc.php" method = "POST">
			<input type="text" name="JMENO" placeholder="Jmeno">
			<input type="text" name="PRIJMENI" placeholder="Prijemni">
			<input type="text" name="EMAIL" placeholder="Email">
			<input type="password" name="HESLO" placeholder="Heslo">
			<label class="container">Premiovy ucet
  				<input type="checkbox" name="PREMIUM" value="PREMIUM_UCET">
  				<span class="checkmark"></span>
			</label>
			<button type="submit" name="submit">Registrovat</button>
		</form>
	</div>
</section>

<?php
include_once 'footer.php';
?>