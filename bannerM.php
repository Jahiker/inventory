<!DOCTYPE html>
<html>
	<head>
		<title>BANNER</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div id="banner">
			<table border="0" id="topLeft">
				<tr>
					<th><a href="home.php" id="home">Inventory</a></th>
				</tr>
			</table>
			<table border="0" id="topRight">
				<tr>
					<td colspan="2"><a href="cierre.php" id="cierre">CERRAR SESION</a></td>
				</tr>
			</table><br><br>
			<table border="0" id="topRight">
				<tr>
					<td><?php echo $_SESSION['nombre'].' '.$_SESSION['apellido'] ?></td>
					<th><img src="img/avatar-372-456324.png" id="avatarB"></th>
				</tr>
			</table>
		</div>
	</body>
</html>