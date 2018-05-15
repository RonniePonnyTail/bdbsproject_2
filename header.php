<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="stajl.css">
</head>
<body>

<header>
	<nav>
		
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php?login=hello""><img src="img/vut_logo.jpg" href="index.php?login=hello" align="left" alt="vutlogo" ></a></li>	
				<?php
					if (isset($_SESSION['u_ID'])) {
						echo '<a class ="test" href="databaze.php?addSong=ready">Hudba</a>';
						if ($_SESSION['u_STAV']== 1 || $_SESSION['u_STAV']== 3) echo '<a class ="test" href="playlist.php">Playlisty</a>';
						if ($_SESSION['u_STAV']== 3) echo '<a class ="test" href="uzivatele.php">Uzivatele</a>';
					}else{}
				?>
			</ul>
			<div class="nav-login">
				<?php
					if (isset($_SESSION['u_ID'])) {
						echo '<form action="includes/logout.inc.php" method="POST">
							  <button type="submit" name="submit">Odhlasit</button>
							  </form>';
						

					}else{
						echo '<form action ="includes/login.inc.php", method="POST">
							  <input type="text" name="EMAIL" placeholder = "Email">
							  <input type="password" name="HESLO" placeholder = "Heslo">
							 <button type="submit" name="submit">Prihlasit</button>
							 </form>
							 <a href="signup.php?signup=register">Registrovat</a>';
					}
				?>	

			</div>
		</div>
	</nav>
</header>