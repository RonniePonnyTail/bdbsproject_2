</body>
<footer ><p class="footer-style">Copyright (C) 2018 Roman Halata
		 <?php if (isset($_SESSION['u_ID'])) {
						echo '<span> Prihlasen: '.$_SESSION['u_EMAIL'].'</p>';
				}else{
					 echo '<span> Neprihlasen</p>';} ?>
</footer>
</html>