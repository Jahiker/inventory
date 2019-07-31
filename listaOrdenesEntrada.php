<?php  
	session_start();
	include('conexion.php');
	if ($_SESSION['sexo']=='masculino') {
		include('bannerM.php');
	} else {
		include('bannerF.php');
	}
	$sql="SELECT * FROM orden WHERE tipo='entrada' ORDER BY id_orden DESC";
	$query=mysqli_query($link,$sql)or die(mysqli_error($link));
	$resultados=mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ORDENES</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>	
		<table align="center" id="lista1" border="1">
			<tr>
				<th colspan="12">ORDENES DE ENTRADA</th>
			</tr>
			<tr>
				<form method="post">
					<th colspan="12" height="35px"><input type="text" name="buscar" placeholder="Nombre del proveedor">       <input type="submit" name="busqueda" value="Buscar"></th>
				</form>
			</tr>
			<tr>
				<th>NRO ORDEN</th>
				<th>FECHA</th>
				<th>PROVEEDOR</th>
				<th>RIF</th>
				<th>DIRECCION</th>
				<th>ALMACEN</th>
				<th>ENTREGA</th>
				<th>RECIBE</th>
				<th>ESTATUS</th>
				<th>AGREGAR ARTICULO</th>
				<th>EDITAR</th>
				<th>VER</th>
			</tr>
			<?php 
				if ($resultados==0) { ?>
					<tr>
						<th colspan="12" style="color: red;"><?php echo "NO SE HAN REALIZADO ORDENES DE ENTRADA"; ?></th>
					</tr><?php
				} else {
					if (isset($_POST['buscar']) && $_POST['buscar']!='') {
						$sql1="SELECT * FROM orden WHERE cliente_proveedor LIKE '$_POST[buscar] %' OR cliente_proveedor LIKE '% $_POST[buscar] %' OR cliente_proveedor LIKE '% $_POST[buscar]' OR cliente_proveedor LIKE '%$_POST[buscar]%'";
						$query1=mysqli_query($link,$sql1)or die(mysqli_error($link));
						$resultados1=mysqli_num_rows($query1);
						if ($resultados1==0) { ?>
							<tr>
								<th colspan="9" style="color: red;"><?php echo "NO HAY RESULTADOS DE LA BUSQUEDA"; ?></th>
							</tr><?php
						} else {
							while ($row1=mysqli_fetch_array($query1)) { ?>
								<tr>
									<td><?php echo $row1['id_orden']; ?></td>
									<td><?php echo $row1['fecha']; ?></td>
									<td><?php echo $row1['cliente_proveedor']; ?></td>
									<td><?php echo $row1['rif']; ?></td>
									<td><?php echo $row1['direccion']; ?></td>
									<td><?php echo $row1['almacen']; ?></td>
									<td><?php echo $row1['entrega']; ?></td>
									<td><?php echo $row1['recibe']; ?></td>
									<?php
										if ($row1['estatus']=='En Proceso') { ?>
											<td><p style="color: red"><?php echo $row1['estatus']; ?></p></td><?php
										} else { ?>
											<td><p style="color: green"><?php echo $row1['estatus']; ?></p></td><?php
										}
									?>		
									<th><a href="inventarioEntrada.php?pro=<?php print $row1[0] ?>"><img src="img/add-1-icon.png" id="modificar"></a></th>
									<th><a href="editarOrdenEntrada.php?pro=<?php print $row1[0] ?>"><img src="img/Pencil512_44200.png" id="modificar"></a></th>
									<th><a href="verOrdenEntrada.php?pro=<?php print $row1[0]; ?>"><img src="img/flash-live-system-ip-ver-1-3-icon-30.png" id="modificar"></a></th>
								</tr><?php
							}
						}
					} else {
						while ($row=mysqli_fetch_array($query)) { ?>
							<tr>
								<td><?php echo $row['id_orden']; ?></td>
								<td><?php echo $row['fecha']; ?></td>
								<td><?php echo $row['cliente_proveedor']; ?></td>
								<td><?php echo $row['rif']; ?></td>
								<td><?php echo $row['direccion']; ?></td>
								<td><?php echo $row['almacen']; ?></td>
								<td><?php echo $row['entrega']; ?></td>
								<td><?php echo $row['recibe']; ?></td>
								<?php
									if ($row['estatus']=='En Proceso') { ?>
										<td><p style="color: red"><?php echo $row['estatus']; ?></p></td>
										<th><a href="inventarioEntrada.php?pro=<?php print $row[0] ?>"><img src="img/add-1-icon.png" id="modificar"></a></th>
										<th><a href="editarOrdenEntrada.php?pro=<?php print $row[0] ?>"><img src="img/Pencil512_44200.png" id="modificar"></a></th>
										<th><a href="verOrdenEntrada.php?pro=<?php print $row[0]; ?>"><img src="img/flash-live-system-ip-ver-1-3-icon-30.png" id="modificar"></a></th><?php
									} else { ?>
										<td><p style="color: green"><?php echo $row['estatus']; ?></p></td>
										<th><a href=""><img src="img/add-2-icon.png" id="modificar"></a></th>
										<th><a href="?>"><img src="img/Pencil512_44201.png" id="modificar"></a></th>
										<th><a href="verOrdenEntrada.php?pro=<?php print $row[0]; ?>"><img src="img/flash-live-system-ip-ver-1-3-icon-30.png" id="modificar"></a></th><?php
									} ?>
							</tr><?php 
						}
					}
				} ?>
		</table>
	</body>
</html>