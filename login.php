<!DOCTYPE html>
<html>
	<head>
		<title>LOGIN</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<form method="post" action="validar.php">
			<div id="login">
				<table align="center" border="0" width="30%" height="280px" id="loginTable">
					<tr>
						<th><img src="img/avatar-372-456324.png" id="avatar"></th>
					</tr>
					<tr>
						<th><input type="text" name="usuario" id="user" placeholder="USUARIO" required=""></th>
					</tr>
					<tr>
						<th><input type="password" name="clave" id="pass" placeholder="CONTRASEÑA"></th>
					</tr>
					<tr>
						<th><input type="submit" name="enter" id="enter" value="ENTRAR"><input type="hidden" name="opcion" value="2"></th>
					</tr>
				</table>
			</div>
		</form>
	</body>
</html>