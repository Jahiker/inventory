<?php  
	session_start();
	include('conexion.php');
	$sql="SELECT * FROM usuario WHERE id_usuario='$_GET[pro]'";
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
						<th colspan="2" id="titleTable">EDITAR USUARIO</th>
					</tr>
					<tr>
						<td>NOMBRE:</td>
						<td><input type="text" name="nombre" id="campo" placeholder="NOMBRE" required="" value="<?php echo $row['nombre']; ?>"><input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']; ?>"></td>
					</tr>
					<tr>
						<td>APELLIDO:</td>
						<td><input type="text" name="apellido" id="campo" placeholder="APELLIDO" required="" value="<?php echo $row['apellido']; ?>"></td>
					</tr>
					<tr>
						<td>USUARIO:</td>
						<td><input type="text" name="usuario" id="campo" placeholder="USUARIO" required="" value="<?php echo $row['usuario']; ?>"></td>
					</tr>
					<tr>
						<td>SEXO:</td>
						<td>
							<label><input type="radio" name="sexo" value="femenino"> Femenino</label><br>
							<label><input type="radio" name="sexo" value="masculino"> Masculino</label>
						</td>
					</tr>
					<tr>
						<th colspan="2"><input type="submit" name="registrar" id="registrar" value="MODIFICAR"><input type="hidden" name="opcion" value="3"></th>
					</tr>
				</table>
			</div>
		</form>
	</body>
</html>