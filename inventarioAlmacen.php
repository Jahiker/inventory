<?php  
	session_start();
	include('conexion.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ALMACENES</title>
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
			$almacen=$_GET['pro'];
			$sql="SELECT * FROM producto WHERE almacen='$almacen'";
			// $sql="SELECT * FROM producto WHERE almacen='$almacen' GROUP BY nombre";
			$query=mysqli_query($link,$sql)or die(mysqli_error($link));
			$resultados=mysqli_num_rows($query);
		?>
			<table align="center" id="lista1" border="1">
				<tr>
					<th colspan="8"><?php echo $almacen; ?></th>
				</tr>
				<tr>
					<form method="post">
						<th colspan="9" height="35px"><input type="text" name="buscar" placeholder="Nombre del producto">       <input type="submit" name="busqueda" value="Buscar"></th>
					</form>
				</tr>
				<tr>
					<th>ID PRODUCTO</th>
					<th>NOMBRE</th>
					<th>DESCRIPCION</th>
					<th>CATEGORIA</th>
					<th>CANTIDAD</th>
					<th>IMAGEN</th>
					<th>EDITAR</th>
					<th>ELIMINAR</th>
				</tr><?php
				if ($resultados==0) { ?>
					<tr>
						<th colspan="8"><p style="color: red;">NO HAY PRODUCTOS CARGADOS A ESTE ALMACEN</p></th>
					</tr><?php
				} else {
					while ($row=mysqli_fetch_array($query)) {
						if (isset($_POST['buscar']) && $_POST['buscar']!='') {
							// $sql1="SELECT *, sum(cantidad) as cantidadProductoAlmacen FROM producto WHERE almacen='$almacen' AND nombre LIKE '$_POST[buscar] %' OR almacen='$almacen' AND nombre LIKE '% $_POST[buscar]' OR almacen='$almacen' AND nombre LIKE '% $_POST[buscar] %' OR almacen='$almacen' AND nombre LIKE '%$_POST[buscar]%' GROUP BY nombre";
							$sql1="SELECT *, sum(cantidad) as cantidadProductoAlmacen FROM producto WHERE almacen='$almacen' AND nombre LIKE '$_POST[buscar] %' OR almacen='$almacen' AND nombre LIKE '% $_POST[buscar]' OR almacen='$almacen' AND nombre LIKE '% $_POST[buscar] %' OR almacen='$almacen' AND nombre LIKE '%$_POST[buscar]%'";
							$query1=mysqli_query($link,$sql1)or die(mysqli_error($link));
							$resultados1=mysqli_num_rows($query1);
							if ($resultados1==0) { ?>
								<tr>
									<th colspan="8"><p style="color: red; border-color: #283593;">NO HAY RESULTADOS DE LA BUSQUEDA</p></th>
								</tr><?php
							} else {
								while ($row1=mysqli_fetch_array($query1)) { ?>
								 	<tr>
										<td><?php echo $row1['id_producto']; ?></td>
										<td><?php echo $row1['nombre']; ?></td>
										<td><?php echo $row1['descripcion']; ?></td>
										<td><?php echo $row1['categoria']; ?></td>
										<td><?php echo $row1['cantidadProductoAlmacen']; ?></td>
										<td><img id="imagen" src="img/<?php echo $row1['imagen']; ?>"></td>
										<th><a href="editarProducto.php?pro=<?php print $row1[0] ?>"><img src="img/Pencil512_44200.png" id="modificar"></a></th>
										<th><a href="eliminarProducto.php?pro=<?php print $row1[0]; ?>"><img src="img/Icon-trash.png" id="modificar"></a></th>
									</tr><?php
								}
							}
						} else { 
							$sql1="SELECT *, sum(cantidad) as cantidadProductoAlmacen FROM producto WHERE nombre='$row[nombre]' AND almacen='$almacen' GROUP BY nombre";
							$query1=mysqli_query($link,$sql1)or die(mysqli_error($link)); 
							while ($row1=mysqli_fetch_array($query1)) { ?>
							 	<tr>
									<td><?php echo $row1['id_producto']; ?></td>
									<td><?php echo $row1['nombre']; ?></td>
									<td><?php echo $row1['descripcion']; ?></td>
									<td><?php echo $row1['categoria']; ?></td>
									<td><?php echo $row1['cantidadProductoAlmacen']; ?></td>
									<td><img id="imagen" src="img/<?php echo $row1['imagen']; ?>"></td>
									<th><a href="editarProducto.php?pro=<?php print $row1[0] ?>"><img src="img/Pencil512_44200.png" id="modificar"></a></th>
									<th><a href="eliminarProducto.php?pro=<?php print $row1[0]; ?>"><img src="img/Icon-trash.png" id="modificar"></a></th>
								</tr><?php
							 }
						}
					}
				} ?>
			</table>
	</body>
</html>