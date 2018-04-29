<?php
include_once 'header.php';
include 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<H2>Editace playlistu</H2>
		<hr width="100%" color="red">
		Nazev playlistu:  <?php echo $_SESSION['p_NAZEV']; ?>
		<hr width="100%" color="red">
	</div>
	<div class="main-wrapper">
		Popis playlistu: <?php echo $_SESSION['p_POPIS']; ?>
		<hr width="100%" color="red">
	</div>
	<section class="odkaz-styl">
	<div>
		<a class ="test" href="showPlaylist.php">Zobrazit playlist</a> 
	</div>
	</section>
	<div class="main-wrapper">
		<hr width="100%" color="red">
		<?php
		$orderBy = array('Kapela', 'Album', 'Pisen', 'Delka');
		$order = 'Kapela';
		if (isset($_GET['sort']) && in_array($_GET['sort'], $orderBy)) {
		    $order = $_GET['sort'];	   
		}
		$sql = "SELECT * FROM hudba ORDER BY ".$order." ASC";

		$result = mysqli_query($conn, $sql);

		echo '<table border="1" id="editPlaylistTable">
		<tr>
		<th><a href="editPlaylist.php?sort=Kapela">Kapela</a></th>
		<th><a href="editPlaylist.php?sort=Album">Album</a></th>
		<th><a href="editPlaylist.php?sort=Pisen">Pisen</a></th>
		<th><a href="editPlaylist.php?sort=Delka">Delka</a></th>
		<th>Pridat do playlistu</th>
		</tr>';

		while($row = mysqli_fetch_array($result))
		{
		echo "<tr>";
		echo "<td>" . $row['KAPELA'] . "</td>";
		echo "<td>" . $row['ALBUM'] . "</td>";
		echo "<td>" . $row['PISEN'] . "</td>";
		echo "<td>" . $row['DELKA'] . "</td>";
		echo "<td>
				<form action ='includes/addSongToPlaylist.inc.php' method = 'POST'>
				<input class='button' type='submit' name = 'ID_song' value = '".$row['ID_HUDBA']."'>
				</td>";
		echo "</tr>";
		}
		echo "</td></tr>";
		echo '</table>';

		$sql = "SELECT * FROM hudba JOIN playlist ON hudba.ID_HUDBA = playlist.ID_HUDBA WHERE playlist.ID_CD = ".$_SESSION['p_ID_CD']."";
		$result = mysqli_query($conn, $sql);

		echo '<table border="1" id="editPlaylistTable">
		<tr>
		<th><a href="editPlaylist.php?sort=Kapela">Kapela</a></th>
		<th><a href="editPlaylist.php?sort=Album">Album</a></th>
		<th><a href="editPlaylist.php?sort=Pisen">Pisen</a></th>
		<th><a href="editPlaylist.php?sort=Delka">Delka</a></th>
		<th>Odebrat z playlistu</th>
		</tr>';

		while($row = mysqli_fetch_array($result))
		{
		echo "<tr>";
		echo "<td>" . $row['KAPELA'] . "</td>";
		echo "<td>" . $row['ALBUM'] . "</td>";
		echo "<td>" . $row['PISEN'] . "</td>";
		echo "<td>" . $row['DELKA'] . "</td>";
		echo "<td>
				<form action ='includes/deleteSongFromPlaylist.inc.php' method = 'POST'>
				<input class='button' type='submit' name = 'ID_songDelete' value = '".$row['ID_HUDBA']."'>
				</td>";
		echo "</tr>";
		}
		echo "</td></tr>";
		echo '</table>';

		?>
	</div>
</section>


<?php
include_once 'footer.php';
?>