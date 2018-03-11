<?php

session_start();
?>



<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
	<nav>
		
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php"><img src="img/vut_logo.jpg" href="index.php" align="left" alt="vutlogo"></a></li>	
			</ul>
			<div class="nav-login">
				<?php
					if (isset($_SESSION['u_ID'])) {
						echo '<form action="includes/logout.inc.php" method="POST">
							  <button type="submit" name="submit">Logout</button>
							  </form>';
					}else{
						echo '<form action ="includes/login.inc.php", method="POST">
							  <input type="text" name="LOGIN_EMAIL" placeholder = "Email">
							  <input type="password" name="HESLO" placeholder = "Heslo">
							 <button type="submit" name="submit">Login</button>
							 </form>
							 <a href="signup.php">Sign up</a>';
					}
				?>					
			</div>
		</div>
	</nav>
</header>