<?php  
	session_start();
	include('conexion.php');
	$sql="SELECT * FROM cliente WHERE id_cliente='$_GET[pro]'";
	$query=mysqli_query($link,$sql)or die(mysqli_error($link));
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>EDITAR</title>
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
						<th colspan="2" id="titleTable">EDITAR CLIENTE</th>
					</tr>
					<tr>
						<td>NOMBRE:</td>
						<td><input type="text" name="nombre" id="campo" placeholder="NOMBRE DE LA EMPRESA" required="" value="<?php echo $row['nombre']; ?>"><input type="hidden" name="id_cliente" value="<?php echo $row['id_cliente'] ?>"></td>
					</tr>
					<tr>
						<td>RIF:</td>
						<td><input type="text" name="rif" id="campo" placeholder="RIF" required="" value="<?php echo $row['rif']; ?>"></td>
					</tr>
					<tr>
						<td>DIRECCION:</td>
						<td><textarea name="direccion" id="campo" required=""><?php echo $row['direccion']; ?></textarea></td>
					</tr>
					<tr>
						<td>TELEFONO:</td>
						<td><input type="text" name="telefono" id="campo" placeholder="TELEFONO" value="<?php echo $row['telefono']; ?>"></td>
					</tr>
					<tr>
						<td>CONTACTO:</td>
						<td><input type="text" name="contacto" id="campo" placeholder=" PERSONA CONTACTO" value="<?php echo $row['contacto']; ?>"></td>
					</tr>
					<tr>
						<th colspan="2"><input type="submit" name="registrar" id="registrar" value="MODIFICAR"><input type="hidden" name="opcion" value="9"></th>
					</tr>
				</table>
			</div>
		</form>
	</body>
</html>