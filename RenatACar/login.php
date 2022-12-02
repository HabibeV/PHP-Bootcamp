<?php


?>
<!DOCTYPE html>
<html>
<head>
	<title>RaC-Giriş Yap</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body >
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup" >
				<form method="POST" action="islemler.php?islem=kayitOl">
					<label for="chk" aria-hidden="true">Kayıt Ol</label>
					<input type="text" name="userName" placeholder="Kullanıcı Adı" required="">
					<input type="email" name="email" placeholder="E-Posta" required="">
					<input type="password" name="password" placeholder="Şifre" required="">
					<button type="submit"  name="kayit">Kayıt Ol</button>
				</form>
			</div>

			<div class="login" >
				<form  action="islemler.php?islem=login" method="POST">
					<label for="chk" aria-hidden="true">Giriş Yap</label>
					<input type="txt" name="userName" placeholder="Kullanıcı Adı" required="">
					<input type="password" name="password" placeholder="Şifre" required="">
					<button type="submit" >Giriş Yap</button>
				</form>
			</div>
	</div>
</body>
</html>