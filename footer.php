</body>
<footer ><p class="footer-style">Copyright (C) 2018 Roman Halata</p>
		 <?php if (isset($_SESSION['u_ID'])) {
						echo "<a >Prihlasen: ".$_SESSION['u_EMAIL']."</a>";
				}else{
					 echo "<a >Neprihlasen</a>";} ?>
</footer>
</html>