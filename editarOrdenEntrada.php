<?php  
	session_start();
	include('conexion.php');
	$sql="SELECT * FROM orden WHERE id_orden='$_GET[pro]'";
	$query=mysqli_query($link,$sql) or die(mysqli_error($link));
	$row=mysqli_fetch_array($query);
	$sql1="SELECT * FROM almacen";
	$query1=mysqli_query($link,$sql1) or die(mysqli_error($link));
	$sql2="SELECT * FROM proveedor";
	$query2=mysqli_query($link,$sql2) or die(mysqli_error($link));
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
						<th colspan="2" id="titleTable">EDITAR ORDEN <?php echo $row['id_orden']; ?></th>
					</tr>
					<tr>
						<?php 
							date_default_timezone_set('America/Caracas');
							$fecha=date('Y-m-d h:i:s');
						?>
						<td width="25%"><p id="etiqueta">FECHA:</p></td>
						<td width="75%"><input type="date" name="fecha" id="campo" required="" value="<?php echo $row['fecha']; ?>"><input type="hidden" name="orden" value="<?php echo $row['id_orden']; ?>"></td>
					</tr>
					<tr>
						<td width="25%"><p id="etiqueta">PROVEEDOR:</p></td>
						<td width="75%">
							<select name="clienteProveedor" id="campo">
								<option value="<?php echo $row['cliente_proveedor']; ?>"><?php echo $row['cliente_proveedor']; ?></option>
								<?php  
									while ($row2=mysqli_fetch_array($query2)) { ?>
										<option value="<?php echo $row2['nombre'] ?>"><?php echo $row2['nombre']; ?></option><?php
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td><p id="etiqueta">ALMACEN:</p></td>
						<td>
							<select name="almacen" id="campo">
								<option value="<?php echo $row['almacen']; ?>"><?php echo $row['almacen']; ?></option>
								<?php  
									while ($row1=mysqli_fetch_array($query1)) { ?>
										<option value="<?php echo $row1['nombre'] ?>"><?php echo $row1['nombre'] ?></option><?php
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td><p id="etiqueta">ENTREGA:</p></td>
						<td><input type="text" name="entrega" id="campo" value="<?php echo $row['entrega']; ?>"></td>
					</tr>
					<tr>
						<td><p id="etiqueta">RECIBE:</p></td>
						<td><input type="text" name="recibe" id="campo" value="<?php echo $row['recibe']; ?>"></td>
					</tr>
					<tr>
						<th colspan="2"><input type="submit" name="continuar" id="continuar" value="CONTINUAR"><input type="hidden" name="opcion" value="12"></th>
					</tr>
				</table>
			</div>
		</form>
	</body>
</html>