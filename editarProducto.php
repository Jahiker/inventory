<?php  
	session_start();
	include('conexion.php');
	$sql="SELECT * FROM producto WHERE id_producto='$_GET[pro]'";
	$query=mysqli_query($link,$sql)or die(mysqli_error($link));
	$row=mysqli_fetch_array($query);
	$sql1="SELECT * FROM almacen";
	$query1=mysqli_query($link,$sql1);
	$resultados1=mysqli_num_rows($query1);
	$sql2="SELECT * FROM categoria";
	$query2=mysqli_query($link,$sql2);
	$resultados2=mysqli_num_rows($query2);
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
		<form method="post" action="validar.php" enctype="multipart/form-data">
			<div>
				<table align="center" border="0" id="regisTable">
					<tr>
						<th colspan="2" id="titleTable">EDITAR PRODUCTO</th>
					</tr>
					<tr>
						<td>NOMBRE:</td>
						<td><input type="text" name="nombre" id="campo" placeholder="NOMBRE" required="" value="<?php echo $row['nombre']; ?>"><input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>"></td>
					</tr>
					<tr>
						<td>DESCRIPCION:</td>
						<td><textarea name="descripcion" id="campo" rows="3" placeholder="Max 120 caracteres"><?php echo $row['descripcion']; ?></textarea></td>
					</tr>
					<tr>
						<td>PRECIO:</td>
						<td><input type="text" name="precio" id="campo" placeholder="Expresado en BsS." required="" value="<?php echo $row['precio']; ?>"></td>
					</tr>
					<tr>
						<td>CATEGORIA:</td>
						<td>
							<select name="categoria">
								<option><?php echo $row['categoria']; ?></option><?php  
								while ($row2=mysqli_fetch_array($query2)) { ?>
									<option><?php echo $row2['categoria']; ?></option><?php	
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>IMAGEN:</td>
						<td><input type="file" name="imagen"></td>
					</tr>
					<tr>
						<th colspan="2"><input type="submit" name="registrar" id="registrar" value="MODIFICAR"><input type="hidden" name="opcion" value="7"></th>
					</tr>
				</table>
			</div>
		</form>
	</body>
</html>