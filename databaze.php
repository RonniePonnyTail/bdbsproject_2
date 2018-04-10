<?php
include_once 'header.php';
include 'includes/dbh.inc.php';
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
		<H2>Databaze</H2>
		<hr width="100%" color="red">
		<?php if ($_SESSION['u_STAV']==1){
			echo '<form class ="addsong-form" action="includes/addSong.inc.php" method = "POST">
			<input type="text" name="kapela" placeholder="Kapela">
			<input type="text" name="album" placeholder="Album">
			<input type="text" name="pisen" placeholder="Píseň">
			<input type="text" name="delka" placeholder="Délka">
			<button type="submit" name="submitSong">Uložit</button>
		</form>';
		}else{
			echo "<H3>Pro pridavani do databaze je potreba mit premiovy ucet</H3>";
		}
		

		//<?php
		$result = mysqli_query($conn,"SELECT * FROM hudba ORDER BY KAPELA ASC");

		echo '<table border="1" id="customers">
		<tr>
		<th>Kapela</th>
		<th>Album</th>
		<th>Pisen</th>
		<th>Delka</th>
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


