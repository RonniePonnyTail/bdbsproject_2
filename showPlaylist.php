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
		<a class ="test" href="editPlaylist.php?addedSong=YouCanAdd">Editovat playlist</a> 
	</div>
	</section>
		<hr width="100%" color="red"> 
		<?php

		$orderBy = array('Kapela', 'Album', 'Pisen', 'Delka');
		$order = 'Kapela';
		if (isset($_GET['sort']) && in_array($_GET['sort'], $orderBy)) {
		    $order = $_GET['sort'];	   
		}

		$sql = "SELECT * FROM hudba JOIN playlist ON hudba.ID_HUDBA = playlist.ID_HUDBA WHERE playlist.ID_CD = ".$_SESSION['p_ID_CD']." ORDER BY ".$order." ASC";
		$result = mysqli_query($conn,$sql);

		echo '<table border="1" id="customers">
		<tr>
		<th><a href="showPlaylist.php?sort=Kapela">Kapela</a></th>
		<th><a href="showPlaylist.php?sort=Album">Album</a></th>
		<th><a href="showPlaylist.php?sort=Pisen">Pisen</a></th>
		<th><a href="showPlaylist.php?sort=Delka">Delka</a></th>
		</tr>';

		while($row = mysqli_fetch_array($result))
		{
		echo "<tr>";
		echo "<td>" . $row['KAPELA'] . "</td>";
		echo "<td>" . $row['ALBUM'] . "</td>";
		echo "<td>" . $row['PISEN'] . "</td>";
		echo "<td>" . $row['DELKA'] . "</td>";
		echo "</tr>";
		}
		echo '</table>';

		?>
	</div>
</section>

<?php
include_once 'footer.php';
?>


