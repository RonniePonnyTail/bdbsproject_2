<?php
include_once 'header.php';
include 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<H2><?php echo $_SESSION['p_NAZEV']; ?></H2>
		<hr width="100%" color="red">
		<section class="odkaz-styl">
	<div>
		<a class ="test" href="editPlaylist.php">Editovat playlist</a> 
	</div>
	</section>
		<hr width="100%" color="red"> 
		<?php
		$sql = "SELECT * FROM hudba JOIN playlist ON hudba.ID_HUDBA = playlist.ID_HUDBA WHERE playlist.ID_CD = ".$_SESSION['p_ID_CD']."";
		$result = mysqli_query($conn,$sql);

		echo '<table border="1" id="customers">
		<tr>
		<th>Kapela</th>
		<th>Album</th>
		<th>Pisen</th>
		<th>Delka</th>
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
		echo '</table>';

		?>
	</div>
</section>

<?php
include_once 'footer.php';
?>


