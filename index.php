<?php
include_once 'header.php';
?>
<script>
function BlockedAccount()
{
alert("Ucet je zablokovan");
}

function EmptyLogin()
{
alert("Vyplnte email a heslo prosim");
}

function UserNonExist()
{
alert("Ucet neexistuje");
}

function BadLogin()
{
alert("Spatne jmeno nebo heslo");
}

</script>
<?php 
	if ($_GET['login'] == 'Blocked') {
		echo '<script>BlockedAccount()</script>';
	}
	if ($_GET['login'] == 'empty') {
		echo '<script>EmptyLogin()</script>';
	}
	if ($_GET['login'] == 'error1') {
		echo '<script>UserNonExist()</script>';
	}
	if ($_GET['login'] == 'error2') {
		echo '<script>BadLogin()</script>';
	}
?>
<section class="main-container">
	<div class="main-wrapper">
		<?php
					if (isset($_SESSION['u_ID'])) {
						header("Location: logged.php");
					}
					else{
						echo '<h2>Pro pristup do databaze je potreba se prihlasit</h2>';
					}
				?>
	</div>
</section>

<?php
include_once 'footer.php';
?>