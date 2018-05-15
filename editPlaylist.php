
<?php
include_once 'header.php';
include 'includes/dbh.inc.php';
?>
<script>
function AlreadyIn()
{
alert("Pisnen uz je pridana"); 
}
</script>
<?php 
	if ($_GET['addedSong'] == 'alreadyInserted') {
		echo '<script>AlreadyIn()</script>';
	}
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
		<a class ="test" href="showPlaylist.php">Zpet na zobrazeni</a> 
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
		$sql = "SELECT * FROM hudba WHERE hudba.STAV = 0 ORDER BY ".$order." ASC";

		$result = mysqli_query($conn, $sql);

		echo '<table border="1" id="editPlaylistTable">
		<tr>
		<th><a href="editPlaylist.php?sort=Kapela&addedSong=ready">Kapela</a></th>
		<th><a href="editPlaylist.php?sort=Album&addedSong=ready">Album</a></th>
		<th><a href="editPlaylist.php?sort=Pisen&addedSong=ready">Pisen</a></th>
		<th><a href="editPlaylist.php?sort=Delka&addedSong=ready">Delka</a></th>
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
				</form></td>";
		echo "</tr>";
		}
		echo "</td></tr>";
		echo '</table>';

		$orderBy1 = array('Kapela', 'Album', 'Pisen', 'Delka');
		$order1 = 'Kapela';
		if (isset($_GET['sort1']) && in_array($_GET['sort1'], $orderBy1)) {
		    $order1 = $_GET['sort1'];	   
		}

		$sql2 = "SELECT * FROM hudba JOIN playlist ON hudba.ID_HUDBA = playlist.ID_HUDBA WHERE playlist.ID_CD = ".$_SESSION['p_ID_CD']." AND hudba.STAV = 0 ORDER BY ".$order1;
		$result2 = mysqli_query($conn, $sql2);

		echo '<table border="1" id="editPlaylistTable">
		<tr>
		<th><a href="editPlaylist.php?sort1=Kapela&addedSong=ready">Kapela</a></th>
		<th><a href="editPlaylist.php?sort1=Album&addedSong=ready">Album</a></th>
		<th><a href="editPlaylist.php?sort1=Pisen&addedSong=ready">Pisen</a></th>
		<th><a href="editPlaylist.php?sort1=Delka&addedSong=ready">Delka</a></th>
		<th>Odebrat z playlistu</th>
		</tr>';

		while($row2 = mysqli_fetch_array($result2))
		{
		echo "<tr>";
		echo "<td>" . $row2['KAPELA'] . "</td>";
		echo "<td>" . $row2['ALBUM'] . "</td>";
		echo "<td>" . $row2['PISEN'] . "</td>";
		echo "<td>" . $row2['DELKA'] . "</td>";
		echo "<td>
				<form action ='includes/testDelete.inc.php' method = 'POST'>
				<input class='button' type='submit' name = 'ID_songToDelete' value = '".$row2['ID_HUDBA']."'/>
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