<?php  
	session_start();
	include('conexion.php');
	$orden=$_GET['pro'];
	$sql="SELECT * FROM producto GROUP BY nombre ORDER BY id_producto DESC";
	$query=mysqli_query($link,$sql)or die(mysqli_error($link));
	$resultados=mysqli_num_rows($query);
	$sql2="SELECT * FROM orden WHERE id_orden='$orden'";
	$query2=mysqli_query($link,$sql2)or die(mysqli_error($link));
	$row2=mysqli_fetch_array($query2);
	$almacen=$row2['almacen'];
	if ($_SESSION['sexo']=='masculino') {
		include('bannerM.php');
	} else {
		include('bannerF.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ORDEN</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>	
		<table align="center" id="lista1" border="1">
			<tr>
				<th colspan="8">AGREGAR PRODUCTOS A LA ORDEN DE ENTRADA <?php  echo $orden; ?></th>
			</tr>
			<tr>
				<form method="post">
					<th colspan="8" height="35px"><input type="text" name="buscar" placeholder="Nombre del producto">       <input type="submit" name="busqueda" value="Buscar"> <a href="listaOrdenesEntrada.php" style="float: right; text-decoration: none; color: green;"><label>Listo <img src="img/Check_green_icon.svg.png" style="height: 25px;"></label></a></th>
				</form>
			</tr>
			<tr>
				<th>ID PRODUCTO</th>
				<th>NOMBRE</th>
				<th>DESCRIPCION</th>
				<th>CATEGORIA</th>
				<th>IMAGEN</th>
				<th>CANTIDAD</th>
				<th>AGREGAR</th>
			</tr>
			<?php 
				if ($resultados==0) { ?>
					<tr>
						<th colspan="8" style="color: red;"><?php echo "NO SE HAN CARGADO PRODUCTOS AL INVENTARIO"; ?></th>
					</tr><?php
				} else {
					if (isset($_POST['buscar']) && $_POST['buscar']!='') {
						$sql1="SELECT * FROM producto WHERE nombre LIKE '$_POST[buscar] %' OR nombre LIKE '% $_POST[buscar] %' OR nombre LIKE '% $_POST[buscar]' ORDER BY id_producto DESC";
						$query1=mysqli_query($link,$sql1)or die(mysqli_error($link));
						$resultados1=mysqli_num_rows($query1);
						if ($resultados1==0) { ?>
							<tr>
								<th colspan="7" style="color: red;"><?php echo "NO HAY RESULTADOS DE LA BUSQUEDA"; ?></th>
							</tr><?php
						} else {
							while ($row1=mysqli_fetch_array($query1)) { ?>
								<form method="post" action="agregarOrdenEntrada.php">
									<tr>
										<td><input type="hidden" name="producto" value="<?php echo $row1['id_producto']; ?>"><?php echo $row1['id_producto']; ?></td>
										<td><input type="hidden" name="nombre" value="<?php echo $row1['nombre']; ?>"><?php echo $row1['nombre']; ?></td>
										<td><input type="hidden" name="descripcion" value="<?php echo $row1['descripcion']; ?>"><?php echo $row1['descripcion']; ?></td>
										<td><input type="hidden" name="producto" value="<?php echo $row1['categoria']; ?>"><?php echo $row1['categoria']; ?></td>
										<td><img id="imagen" src="img/<?php echo $row1['imagen']; ?>"></td>
										<td><input type="text" name="cantidad" value="1"><input type="hidden" name="orden" value="<?php echo $orden; ?>"><input type="hidden" name="almacen" value="<?php echo $almacen; ?>"></td>
										<th><input type="submit" name="agregar" value="AGREGAR"></th>
									</tr>
								</form><?php
							}
						}
					} else {
						while ($row=mysqli_fetch_array($query)) { ?>
							<form method="post" action="agregarOrdenEntrada.php">
								<tr>
									<td><input type="hidden" name="producto" value="<?php echo $row['id_producto']; ?>"><?php echo $row['id_producto']; ?></td>
									<td><input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?></td>
									<td><input type="hidden" name="descripcion" value="<?php echo $row['descripcion']; ?>"><?php echo $row['descripcion']; ?></td>
									<td><input type="hidden" name="categoria" value="<?php echo $row['categoria']; ?>"><?php echo $row['categoria']; ?></td>
									<td><input type="hidden" name="imagen" value="<?php echo $row['imagen']; ?>"><img id="imagen" src="img/<?php echo $row['imagen']; ?>"></td>
									<td><input type="text" name="cantidad" value="1"><input type="hidden" name="orden" value="<?php echo $orden; ?>"><input type="hidden" name="almacen" value="<?php echo $almacen; ?>"></td>
									<th><input type="submit" name="agregar" value="AGREGAR"></th>
								</tr>
							</form><?php
						}
					}
				} ?>
				<
		</table>
	</body>
</html>