<?php
include_once 'header.php';
include 'includes/dbh.inc.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<H2>Vase Playlisty</H2>
		<hr width="100%" color="red">
		<?php
		$result = mysqli_query($conn,"SELECT * FROM cd WHERE STAV = 0 ORDER BY NAZEV ASC");

		echo '<table border="1" id="customers">
		<tr>
		<th>Nazev playlistu</th>
		<th>Popis</th>
		<th>Prochazet</th>
		<th>Vymazat</th>
		</tr>';

		while($row = mysqli_fetch_array($result))
		{
			if ($_SESSION['u_ID'] == $row['ID_UZIV']) {
				echo "<tr>";
				echo "<td>" . $row['NAZEV'] . "</td>";
				echo "<td>" . $row['POPIS'] . "</td>";
				echo "<td>
				<form action ='includes/showPlaylist.inc.php' method = 'POST'>
				<input class='button' type='submit' name = 'ID_playlist' value = '".$row['ID_CD']."'>
				</form></td>";
				echo "<td>
		        <form action ='includes/deletePlaylist.inc.php' method = 'POST'>
		        <input class='button' type='submit' name = 'ID_playlistToDelete' value = '".$row['ID_CD']."'>
		        </td>";
				echo "</tr>";
			}
		}
		echo '</table>';

		?>
	</div>
</section>

<?php
include_once 'footer.php';
?>