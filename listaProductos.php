<?php  
	session_start();
	include('conexion.php');
	if ($_SESSION['sexo']=='masculino') {
		include('bannerM.php');
	} else {
		include('bannerF.php');
	}
	$sql="SELECT *, sum(cantidad) as cantidadTotal FROM producto GROUP BY nombre";
	$query=mysqli_query($link,$sql)or die(mysqli_error($link));
	$resultados=mysqli_num_rows($query);
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
		<table align="center" id="lista1" border="1">
			<tr>
				<th colspan="8">PRODUCTOS</th>
			</tr>
			<tr>
				<form method="post">
					<th colspan="8" height="35px"><input type="text" name="buscar" placeholder="Nombre del producto">       <input type="submit" name="busqueda" value="Buscar"></th>
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
			</tr>
			<?php 
				if ($resultados==0) { ?>
					<tr>
						<th colspan="8" style="color: red;"><?php echo "NO SE HAN CARGADO PRODUCTOS AL INVENTARIO"; ?></th>
					</tr><?php
				} else {
					if (isset($_POST['buscar']) && $_POST['buscar']!='') {
						$sql1="SELECT *, sum(cantidad) as cantidadTotal FROM producto WHERE nombre LIKE '$_POST[buscar] %' OR nombre LIKE '% $_POST[buscar] %' OR nombre LIKE '% $_POST[buscar]' OR nombre LIKE '%$_POST[buscar]%' GROUP BY nombre";
						$query1=mysqli_query($link,$sql1)or die(mysqli_error($link));
						$resultados1=mysqli_num_rows($query1);
						if ($resultados1==0) { ?>
							<tr>
								<th colspan="9" style="color: red;"><?php echo "NO HAY RESULTADOS DE LA BUSQUEDA"; ?></th>
							</tr><?php
						} else {
							while ($row1=mysqli_fetch_array($query1)) { ?>
								<tr>
									<td><?php echo $row1['id_producto']; ?></td>
									<td><?php echo $row1['nombre']; ?></td>
									<td><?php echo $row1['descripcion']; ?></td>
									<td><?php echo $row1['categoria']; ?></td>
									<td><?php echo $row1['cantidadTotal']; ?></td>
									<td><img id="imagen" src="img/<?php echo $row1['imagen']; ?>"></td>
									<th><a href="editarProducto.php?pro=<?php print $row1[0] ?>"><img src="img/Pencil512_44200.png" id="modificar"></a></th>
									<th><a href="eliminarProducto.php?pro=<?php print $row1[0]; ?>"><img src="img/Icon-trash.png" id="modificar"></a></th>
								</tr><?php
							}
						}
					} else {
						while ($row=mysqli_fetch_array($query)) { ?>
							<tr>
								<td><?php echo $row['id_producto']; ?></td>
								<td><?php echo $row['nombre']; ?></td>
								<td><?php echo $row['descripcion']; ?></td>
								<td><?php echo $row['categoria']; ?></td>
								<td><?php echo $row['cantidadTotal']; ?></td>
								<td><img id="imagen" src="img/<?php echo $row['imagen']; ?>"></td>
								<th><a href="editarProducto.php?pro=<?php print $row[0] ?>"><img src="img/Pencil512_44200.png" id="modificar"></a></th>
								<th><a href="eliminarProducto.php?pro=<?php print $row[0]; ?>"><img src="img/Icon-trash.png" id="modificar"></a></th>
							</tr><?php
						}
					}
				} ?>
		</table>
	</body>
</html>