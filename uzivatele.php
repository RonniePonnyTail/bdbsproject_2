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
		<H2>Sprava uzivatelu</H2>
		<hr width="100%" color="red">
		<?php 

		$orderBy = array('Jmeno', 'Prijmeni', 'Email');
		$order = 'Jmeno';
		if (isset($_GET['sort']) && in_array($_GET['sort'], $orderBy)) {
		    $order = $_GET['sort'];	   
		}
		$sql = "SELECT * FROM uzivatel WHERE uzivatel.STAV > 0 ORDER BY ".$order." ASC";

		$result = mysqli_query($conn, $sql);

		echo '<table border="1" id="customers">
		<tr>
		<th><a href="uzivatele.php?sort=Jmeno">Jmeno</a></th>
		<th><a href="uzivatele.php?sort=Prijmeni">Prijmeni</a></th>
		<th><a href="uzivatele.php?sort=Email">Email</a></th>
    	<th>Odebrat</th>
		</tr>';

		while($row = mysqli_fetch_array($result))
		{
		echo "<tr>";
		echo "<td>" . $row['JMENO'] . "</td>";
		echo "<td>" . $row['PRIJMENI'] . "</td>";
		echo "<td>" . $row['EMAIL'] . "</td>";
    echo "<td>
        <form action ='includes/deleteUser.inc.php' method = 'POST'>
        <input class='button' type='submit' name = 'ID_userToDelete' value = '".$row['ID']."'>
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
