<?php
include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Sign Up</h2>
		<form class ="signup-form" action="includes/signup.inc.php" method = "POST">
			<input type="text" name="JMENO" placeholder="Jmeno">
			<input type="text" name="PRIJMENI" placeholder="Prijemni">
			<input type="text" name="LOGIN_EMAIL" placeholder="Email">
			<input type="password" name="HESLO" placeholder="Heslo">
			<input type="checkbox" name="PREMIUM" value="Premiovy uzivatel">
			<button type="submit" name="submit">Sign up</button>
		</form>
	</div>
</section>

<?php
include_once 'footer.php';
?>