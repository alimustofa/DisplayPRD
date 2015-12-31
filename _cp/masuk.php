<script type="text/javascript" src='_asset/_ajax/login.js'></script>
<?php
	echo "
		<body style='overflow:hidden;'>
			<div class='bg-masuk'>
				<div class='wrapper-logo'>
					<div class='logo animated zoomInDown'></div>
				</div>
				<div class='wrapper-auto' style='width:340px;'>
				<div class='psn'></div>
					<div class='pd15 fadeIn animated'>
						<form method='POST' action='' id='form_input'>
							<div class='f-symbol' style='position:absolute; margin:13px; margin-left:18px;'>.</div>
								<input type='text' autocomplete='off' name='username' placeholder='Username' class='tf-masuk transi-3' style='width:310px; border-bottom:solid 1px rgba(0,0,0,0.1);'>
								<div class='psn_username'></div>
							<div class='f-symbol' style='position:absolute; margin:13px; margin-left:18px;'>w</div>
								<input type='password' name='password' placeholder='Password' class='tf-masuk transi-3' style='width:310px;'>
								<div class='psn_password'></div>
							<button class='btn-masuk transi-3' style='width:310px;' name='kirim' value='kirim'>MASUK</button>
						</form>
					</div>
					
					<p align='center' style='font-family:segoe ui; color:white;'>&copy ".date('Y')." PT NUTRIFOOD. Alright Reserved.</p>
				</div>
			</div>
		</body>
	";
?>