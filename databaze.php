
<?php
include_once 'header.php';
include 'includes/dbh.inc.php';
?>

<script>
function VyplnUdajePopUp()
{
alert("Nebyly vyplneny udaje");
}

function AlreadyExists()
{
alert("Pisnicka uz je vlozena");
}

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
  if ($_GET['addSong'] == 'empty') {
    echo '<script>VyplnUdajePopUp()</script>';
  }
  if ($_GET['addSong'] == 'SongAlredyExist') {
    echo '<script>AlreadyExists()</script>';
  }
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
		<?php if ($_SESSION['u_STAV']==1 || $_SESSION['u_STAV']== 3){

			echo '<form class ="signup-form" action="includes/addSong.inc.php" method = "POST">
			<p> Pridat pisen do databaze </p>
			<input type="text" name="kapela" placeholder="Kapela">
			<input type="text" name="album" placeholder="Album">
			<input type="text" name="pisen" placeholder="Pisen">
			<input type="text" name="delka" placeholder="Delka">
			<button type="submit" name="submitSong">Pridat</button>
		</form>';
  }else
  {
    echo "<H3>Pro pridavani do databaze je potreba mit premiovy ucet</H3>";
  }

		echo "<p></p><input type='text' id='myInput' onkeyup='myFunctionBand()' placeholder='Hledej podle kapely..'>";
		echo "<input type='text' id='myInput1' onkeyup='myFunctionAlbum()' placeholder='Hledej podle Alba..'>";
		echo "<input type='text' id='myInput2' onkeyup='myFunctionPisen()' placeholder='Hledej podle Pisne..'>";
		echo "<input type='text' id='myInput3' onkeyup='myFunctionDelka()' placeholder='Hledej podle Delky..'>";

		
			
		

		
		$orderBy = array('Kapela', 'Album', 'Pisen', 'Delka');
		$order = 'Kapela';
		if (isset($_GET['sort']) && in_array($_GET['sort'], $orderBy)) {
		    $order = $_GET['sort'];	   
		}
		$sql = "SELECT * FROM hudba WHERE hudba.STAV = 0 ORDER BY ".$order." ASC";

		$result = mysqli_query($conn, $sql);

		echo '<table border="1" id="customers">
		<tr>
		<th><a href="databaze.php?sort=Kapela&addSong=Ready">Kapela</a></th>
		<th><a href="databaze.php?sort=Album&addSong=Ready">Album</a></th>
		<th><a href="databaze.php?sort=Pisen&addSong=Ready">Pisen</a></th>
		<th><a href="databaze.php?sort=Delka&addSong=Ready">Delka</a></th>';
    if( $_SESSION['u_STAV']==1 || $_SESSION['u_STAV']== 3){
      echo '<th>Odebrat</th>
    </tr>';
    }
    

		while($row = mysqli_fetch_array($result))
		{
		echo "<tr>";
		echo "<td>" . $row['KAPELA'] . "</td>";
		echo "<td>" . $row['ALBUM'] . "</td>";
		echo "<td>" . $row['PISEN'] . "</td>";
		echo "<td>" . $row['DELKA'] . "</td>";
    if( $_SESSION['u_STAV']==1 || $_SESSION['u_STAV']== 3){
      echo "<td>
      <form action ='includes/deleteSong.inc.php' method = 'POST'>
      <input class='button' type='submit' name = 'ID_songToDelete' value = '".$row['ID_HUDBA']."'>
      </td>";
      }
		echo "</tr>";
		}
		echo '</table>';

		?>
	</div>
</section>

<?php
include_once 'footer.php';
?>


