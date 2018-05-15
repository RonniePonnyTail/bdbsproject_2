</body>
<footer ><p class="footer-style">Copyright (C) 2018 Roman Halata
		 <?php if (isset($_SESSION['u_ID'])) {
						echo '<span> Prihlasen: '.$_SESSION['u_EMAIL'].' ';
						if ($_SESSION['u_STAV']==1) {
							echo 'je premiovy ucet</p>';
						}elseif ($_SESSION['u_STAV']==3) {
							echo 'je ADMINISTRATORSKY ucet</p>';
						}else{
							echo 'je obycejny ucet</p>';
						}
				}else{
					 echo '<span> Neprihlasen</p>';} ?>
</footer>
</html>