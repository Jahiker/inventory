<?php  
	session_start();
	include('conexion.php');
	$orden=$_GET['pro'];
	$sql="SELECT * FROM orden WHERE id_orden='$orden'";
	$query=mysqli_query($link,$sql) or die(mysqli_error($link));
	$row=mysqli_fetch_array($query);
	$sql1="SELECT * FROM mercancia WHERE id_orden='$orden'";
	$query1=mysqli_query($link,$sql1)or die(mysqli_error($link));
	$resultados1=mysqli_num_rows($query1);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ORDEN DE ENTRADA <?php echo $row['almacen']; ?></title>
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
		<table align="center" id="lista2" border="1">
			<tr>
				<th colspan="5"><p id="titleTable">ORDEN DE ENTRADA <?php echo $row['almacen']; ?></p></th>
			</tr>
			<tr>
				<td width="25%"><p align="right"><b>Fecha:</b></p></td>
				<td width="25%"><p align="center"><?php echo $row['fecha']; ?></p></td>
				<td width="25%"><p align="right"><b>Nro. Orden:</b></p></td>
				<td width="25%"><p align="center" style="color: red;">ENT-<?php echo $row['id_orden']; ?></p></td>
			</tr>
			<tr>
				<td><p align="right"><b>Proveedor:</b></p></td>
				<td><p align="center"><?php echo $row['cliente_proveedor']; ?></p></td>
				<td><p align="right"><b>Rif:</b></p></td>
				<td><p align="center"><?php echo $row['rif']; ?></p></td>
			</tr>
			<tr>
				<td><p align="right"><b>Direccion:</b></p></td>
				<td colspan="3"><p align="center"><?php echo $row['direccion']; ?></p></td>
			</tr>
			<tr>
				<td><p align="right"><b>Entrega:</b></p></td>
				<td><p align="center"><?php echo $row['entrega']; ?></p></td>
				<td><p align="right"><b>Recibe:</b></p></td>
				<td><p align="center"><?php echo $row['recibe']; ?></p></td>
			</tr>
			<tr>
				<th colspan="4" height="30px" style="color: red; border-color: #283593;">MERCANCIA</th>
			</tr>
			<tr>
				<th>ID ARTICULO</th>
				<th>CANTIDAD</th>
				<th>NOMBRE</th>
				<th>DESCRIPCION</th>
			</tr>
			<?php  
				if ($resultados1==0) { ?>
					<tr>
						<th colspan="4" height="25px" style="color: red; border-color: #283593;">NO SE HA CARGADO MERCANCIA A ESTA ORDEN</th>
					</tr><?php
				} else {
					while ($row1=mysqli_fetch_array($query1)) { ?>
						<tr>
							<td height="25px"><p align="center"><?php echo $row1['id_producto']; ?></p></td>
							<td height="25px"><p align="center"><?php echo $row1['cantidad']; ?></p></td>
							<td height="25px"><p align="center"><?php echo $row1['nombre']; ?></p></td>
							<td height="25px"><p align="center"><?php echo $row1['descripcion']; ?></p></td>
						</tr><?php
					}
				}
			?>
			<tr>
				<th colspan="4" height="50px"></th>
			</tr>
			<tr>
				<th colspan="2">Firma entrega</th>
				<th colspan="2">Firma Reciba</th>
			</tr>
			<?php  
				if ($row['estatus']=='En Proceso') { ?>
					<tr>
						<th height="50px" colspan="2"><input type="button" name="imprimir" id="continuar" onclick="print()" value="IMPRIMIR"></th>
						<th colspan="2"><form method="post" action="validar.php"><input type="hidden" name="orden" value="<?php echo $orden; ?>"><input type="hidden" name="opcion" value="15"><input type="submit" name="procesar" id="continuar" value="PROCESAR ORDEN"></form></th>
					</tr><?php
				} else { ?>
					<tr>
						<th height="50px" colspan="4"><input type="button" name="imprimir" id="continuar" onclick="print()" value="IMPRIMIR"></th>
					</tr><?php
				}
			?>
		</table>
	</body>
</html>