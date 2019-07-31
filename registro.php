<?php  
	session_start();
	include('conexion.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>REGISTRO</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php 
			if ($_SESSION['sexo']=='masculino') {
				include('bannerM.php');
			} else {
				include('bannerF.php');
			}
		?>
		<form method="post" action="validar.php">
			<div>
				<table align="center" border="0" id="regisTable">
					<tr>
						<th colspan="2" id="titleTable">REGISTRO</th>
					</tr>
					<tr>
						<td>NOMBRE:</td>
						<td><input type="text" name="nombre" id="campo" placeholder="NOMBRE" required=""></td>
					</tr>
					<tr>
						<td>APELLIDO:</td>
						<td><input type="text" name="apellido" id="campo" placeholder="APELLIDO" required=""></td>
					</tr>
					<tr>
						<td>USUARIO:</td>
						<td><input type="text" name="usuario" id="campo" placeholder="USUARIO" required=""></td>
					</tr>
					<tr>
						<td>CONTRASEÑA:</td>
						<td><input type="password" name="clave" id="campo" placeholder="CONTRASEÑA"></td>
					</tr>
					<tr>
						<td>CONFIRMAR:</td>
						<td><input type="password" name="clave1" id="campo" placeholder=" CONFIRMA CONTRASEÑA"></td>
					</tr>
					<tr>
						<td>SEXO:</td>
						<td>
							<label><input type="radio" name="sexo" value="femenino"> Femenino</label><br>
							<label><input type="radio" name="sexo" value="masculino"> Masculino</label>
						</td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="registrar" id="registrar" value="REGISTRAR"><input type="reset" name="borrar" id="borrar" value="BORRAR"><input type="hidden" name="opcion" value="1"></td>
					</tr>
				</table>
			</div>
		</form>
	</body>
</html>