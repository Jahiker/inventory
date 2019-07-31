<?php  
	session_start();
	include('conexion.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CLIENTES Y PROVEEDORES</title>
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
						<td>TIPO:</td>
						<td>
							<label><input type="radio" name="tipo" value="cliente"> Cliente</label><br>
							<label><input type="radio" name="tipo" value="proveedor"> Proveedor</label>
						</td>
					</tr>
					<tr>
						<td>NOMBRE:</td>
						<td><input type="text" name="nombre" id="campo" placeholder="NOMBRE DE LA EMPRESA" required=""></td>
					</tr>
					<tr>
						<td>RIF:</td>
						<td><input type="text" name="rif" id="campo" placeholder="RIF" required=""></td>
					</tr>
					<tr>
						<td>DIRECCION:</td>
						<td><textarea name="direccion" id="campo" required=""></textarea></td>
					</tr>
					<tr>
						<td>TELEFONO:</td>
						<td><input type="text" name="telefono" id="campo" placeholder="TELEFONO"></td>
					</tr>
					<tr>
						<td>CONTACTO:</td>
						<td><input type="text" name="contacto" id="campo" placeholder=" PERSONA CONTACTO"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="registrar" id="registrar" value="REGISTRAR"><input type="reset" name="borrar" id="borrar" value="BORRAR"><input type="hidden" name="opcion" value="8"></td>
					</tr>
				</table>
			</div>
		</form>
	</body>
</html>