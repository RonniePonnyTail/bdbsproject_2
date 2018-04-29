<?php
include_once 'header.php';
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