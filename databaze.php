<?php
include_once 'header.php';
include 'includes/dbh.inc.php';
?>
<script>
function myFunctionBand() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("customers");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

function myFunctionAlbum() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("customers");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

function myFunctionPisen() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("customers");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

function myFunctionDelka() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("customers");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

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

			echo '<form class ="signup-form" action="includes/addSong.inc.php" method = "POST">
			<p> Pridat pisen do databaze </p>
			<input type="text" name="kapela" placeholder="Kapela">
			<input type="text" name="album" placeholder="Album">
			<input type="text" name="pisen" placeholder="Pisen">
			<input type="text" name="delka" placeholder="Delka">
			<button type="submit" name="submitSong">Pridat</button>
		</form>';

		echo "<p></p><input type='text' id='myInput' onkeyup='myFunctionBand()' placeholder='Hledej podle kapely..'>";
		echo "<input type='text' id='myInput1' onkeyup='myFunctionAlbum()' placeholder='Hledej podle Alba..'>";
		echo "<input type='text' id='myInput2' onkeyup='myFunctionPisen()' placeholder='Hledej podle Pisne..'>";
		echo "<input type='text' id='myInput3' onkeyup='myFunctionDelka()' placeholder='Hledej podle Delky..'>";

		/*echo '<form class ="signup-form" action="includes/filterSong.inc.php" method = "POST">
			<p> Vyhledat pisen </p>
			<input type="text" name="kapela" placeholder="Kapela">
			<input type="text" name="album" placeholder="Album">
			<input type="text" name="pisen" placeholder="Pisen">
			<input type="text" name="delka" placeholder="Delka">
			<button type="submit" name="filterSong">Hledat</button>
		</form>';*/

		}else{
			echo "<H3>Pro pridavani do databaze je potreba mit premiovy ucet</H3>";
		}

		
		$orderBy = array('Kapela', 'Album', 'Pisen', 'Delka');
		$order = 'Kapela';
		if (isset($_GET['sort']) && in_array($_GET['sort'], $orderBy)) {
		    $order = $_GET['sort'];	   
		}
		$sql = "SELECT * FROM hudba ORDER BY ".$order." ASC";

		$result = mysqli_query($conn, $sql);

		echo '<table border="1" id="customers">
		<tr>
		<th><a href="databaze.php?sort=Kapela">Kapela</a></th>
		<th><a href="databaze.php?sort=Album">Album</a></th>
		<th><a href="databaze.php?sort=Pisen">Pisen</a></th>
		<th><a href="databaze.php?sort=Delka">Delka</a></th>
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


