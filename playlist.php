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
		<hr width="100%" color="red">
	</div>
	
</section>
<section class="odkaz-styl">
	<div>
		<a class ="test" href="addPlaylist.php">Vytvorit playlist</a> 
		<a class ="test" href="browsePlaylist.php">Prochazet playlisty</a>
	</div>
</section>

<?php
include_once 'footer.php';
?>