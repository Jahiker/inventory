<?php  
	session_start();
	include('conexion.php');
	$sql="SELECT * FROM almacen";
	$query=mysqli_query($link,$sql);
	$resultados=mysqli_num_rows($query);
	$sql1="SELECT * FROM categoria";
	$query1=mysqli_query($link,$sql1);
	$resultados1=mysqli_num_rows($query1);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PRODUCTOS</title>
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
						<th colspan="2" id="titleTable">CARGAR PRODUCTOS</th>
					</tr>
					<tr>
						<td>NOMBRE:</td>
						<td><input type="text" name="nombre" id="campo" placeholder="NOMBRE" required=""></td>
					</tr>
					<tr>
						<td>DESCRIPCION:</td>
						<td><textarea name="descripcion" id="campo" rows="3" placeholder="Max 120 caracteres"></textarea></td>
					</tr>
					<tr>
						<td>PRECIO:</td>
						<td><input type="text" name="precio" id="campo" placeholder="Expresado en BsS." required=""><input type="hidden" name="cantidad" value="0"></td>
					</tr>
					<tr>
						<td>CATEGORIA:</td>
						<td>
							<select name="categoria"><?php  
								if ($resultados1==0) { ?>
									<option>No existen categorias</option><?php
								} else {
									while ($row1=mysqli_fetch_array($query1)) { ?>
										<option><?php echo $row1['categoria']; ?></option><?php
									}
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>IMAGEN:</td>
						<td><input type="file" name="imagen" required=""></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="registrar" id="registrar" value="CARGAR"><input type="reset" name="borrar" id="borrar" value="BORRAR"><input type="hidden" name="opcion" value="6"></td>
					</tr>
				</table>
			</div>
		</form>
	</body>
</html>