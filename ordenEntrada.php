<?php  
	session_start();
	include('conexion.php');
	$sql="SELECT * FROM proveedor";
	$query=mysqli_query($link,$sql) or die(mysqli_error($link));
	$resultados=mysqli_num_rows($query);
	$sql1="SELECT * FROM almacen";
	$query1=mysqli_query($link,$sql1) or die(mysqli_error($link));
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ORDEN DE ENTRADA</title>
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
				<table align="center" border="1" id="orden">
					<tr>
						<th colspan="2" id="titleTable">ORDEN DE ENTRADA</th>
					</tr>
					<tr>
						<?php 
							date_default_timezone_set('America/Caracas');
							$fecha=date('Y-m-d h:i:s');
						?>
						<td width="25%"><p id="etiqueta">FECHA:</p></td>
						<td width="75%"><input type="date" name="fecha" id="campo" required="" value="<?php echo $fecha; ?>"><input type="hidden" name="tipo" value="entrada"></td>
					</tr>
					<tr>
						<td width="25%"><p id="etiqueta">PROVEEDOR:</p></td>
						<td width="75%">
							<select name="clienteProveedor" id="campo">
							<?php  
								if ($resultados==0) { ?>
									<option>NO HAY PROVEEDORES</option><?php
								} else {
									while ($row=mysqli_fetch_array($query)) { ?>
										<option value="<?php echo $row['nombre'] ?>"><?php echo $row['nombre']; ?></option><?php
									}
								}
							?>
						</select>
					</td>
					</tr>
					<tr>
						<td><p id="etiqueta">ALMACEN:</p></td>
						<td>
							<select name="almacen" id="campo">
								<?php  
									while ($row1=mysqli_fetch_array($query1)) { ?>
										<option value="<?php echo $row1['nombre']; ?>"><?php echo $row1['nombre']; ?></option><?php
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td><p id="etiqueta">ENTREGA:</p></td>
						<td><input type="text" name="entrega" id="campo"></td>
					</tr>
					<tr>
						<td><p id="etiqueta">RECIBE:</p></td>
						<td><input type="text" name="recibe" id="campo"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="registrar" id="registrar" value="CONTINUAR"><input type="reset" name="borrar" id="borrar" value="BORRAR"><input type="hidden" name="opcion" value="11"></td>
					</tr>
				</table>
			</div>
		</form>
	</body>
</html>