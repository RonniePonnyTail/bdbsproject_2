<?php
include_once 'header.php';
?>
<?php
if(!isset($_SESSION['u_ID']))
{
    // not logged in
    header('Location: idnex.php');
    exit();
}?>
<section class="main-container">
	<div class="main-wrapper">
		<H2>Playlist</H2>
	</div>
</section>

<?php
include_once 'footer.php';
?>