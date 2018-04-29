<?php
include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<H2>Playlist</H2>
		<hr width="100%" color="red">

		<form class ="signup-form" action="includes/addPlaylist.inc.php" method = "POST">
			<input type="text" name="nazev" placeholder="Nazev Playlistu">
			<textarea type="text" name="popis" placeholder="Popis playlistu" rows="10" cols="54"></textarea>
			<button type="submit" name="createPlaylist">Vytvorit</button>
		</form>
	</dir>
</section>

<?php
include_once 'footer.php';
?>