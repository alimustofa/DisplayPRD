<?php
	cek_err();
	cek_suc();
	
	$q_user = msq($kon, "select * from t_admin where username='$_SESSION[username]'");
	$d_user = mfa($q_user);
	
	echo "
	<script>
		document.title = 'Edit Password | DISPLAY PRD'
	</script>
	
		<div class='title-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>?</div>
					<div class='f-putih f24 f-segoe' style='padding:15px; margin-top:50px;'>Edit Password<br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Form untuk mengedit password...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='f14'><a href='#' class='link-biru'>SCHOOL FRENZY</a> <span class='f-none f-symbol1'>&#215;</span> Form</div>
		</div>
						
		<div class='wrapper-tengah'>
			<div class='wrapper-form' style='width:500px;'>
				<div class='title-form'><span class='f-symbol mr10'>?</span>EDIT PASSWORD</div>		
				<div class='pd15'>
					<form method='POST' action='aksi_edit_password' enctype='multipart/form-data'>
						<div class='form-grup'>
							<div class='label-form'>USERNAME</div>
							<input type='text' class='form transi-3' name='username' required readonly value='$d_user[username]'>
						</div>
						<div class='form-grup'>
							<div class='label-form'>PASSWORD BARU</div>
							<input type='password' class='form transi-3' name='password' required>
						</div>
						<div class='form-grup'>
							<div class='label-form'>ULANGI PASSWORD BARU</div>
							<input type='password' class='form transi-3' name='password_ulangi' required>
						</div>
						
						<button class='bkirim transi-3' value='kirim' name='kirim'><span class='f-symbol1 f-none' style='margin-right:20px;'>?</span>EDIT PASSWORD</button>
					</form>
				</div>	
			</div>
		</div>
			
	";
	
	unset($_SESSION['suc']);
	unset($_SESSION['err']);
?>