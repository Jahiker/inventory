<?php  
	session_start();
	include('conexion.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CLIENTES</title>
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
			$sql="SELECT * FROM cliente";
			$query=mysqli_query($link,$sql);
			$resultados=mysqli_num_rows($query);
		?>			
			<table align="center" id="lista1" border="1">
				<tr>
					<th colspan="8">CLIENTES</th>
				</tr>
				<tr>
					<form method="post">
						<th colspan="9" height="35px"><input type="text" name="buscar" placeholder="Nombre del cliente">       <input type="submit" name="busqueda" value="Buscar"></th>
					</form>
				</tr>
				<tr>
					<th>NRO CLIENTE</th>
					<th>CLIENTE</th>
					<th>RIF</th>
					<th>DIRECCION</th>
					<th>TELEFONO</th>
					<th>CONTACTO</th>
					<th>EDITAR</th>
					<th>ELIMINAR</th>
				</tr>
				<?php
					if ($resultados==0) { ?>
						<tr>
							<th colspan="8" style="color: red;">NO HAY CLIENTES REGISTRADOS</th>
						</tr><?php
					} else {
						if (isset($_POST['buscar']) && $_POST['buscar']!='') {
							$sql1="SELECT * FROM cliente WHERE nombre LIKE '$_POST[buscar] %' OR nombre LIKE '% $_POST[buscar] %' OR nombre LIKE '% $_POST[buscar]' OR nombre LIKE '%$_POST[buscar]%'";
							$query1=mysqli_query($link,$sql1)or die(mysqli_error($link));
							$resultados1=mysqli_num_rows($query1);
							if ($resultados1==0) { ?>
								<tr>
									<th colspan="8" style="color: red;"><?php echo "NO HAY RESULTADOS DE LA BUSQUEDA"; ?></th>
								</tr><?php
							} else {
								while ($row1=mysqli_fetch_array($query1)) { ?>
									<tr>
										<td><?php echo $row1['id_cliente']; ?></td>
										<td><?php echo $row1['nombre']; ?></td>
										<td><?php echo $row1['rif']; ?></td>
										<td><?php echo $row1['direccion']; ?></td>
										<td><?php echo $row1['telefono']; ?></td>
										<td><?php echo $row1['contacto']; ?></td>
										<th><a href="editarCliente.php?pro=<?php print $row1[0] ?>"><img src="img/Pencil512_44200.png" id="modificar"></a></th>
										<th><a href="eliminarCliente.php?pro=<?php print $row1[0]; ?>"><img src="img/Icon-trash.png" id="modificar"></a></th>
									</tr><?php
								}
							}
						} else {
							while ($row=mysqli_fetch_array($query)) { ?>
								<tr>
									<td><?php echo $row['id_cliente']; ?></td>
									<td><?php echo $row['nombre']; ?></td>
									<td><?php echo $row['rif']; ?></td>
									<td><?php echo $row['direccion']; ?></td>
									<td><?php echo $row['telefono']; ?></td>
									<td><?php echo $row['contacto']; ?></td>
									<th><a href="editarCliente.php?pro=<?php print $row[0] ?>"><img src="img/Pencil512_44200.png" id="modificar"></a></th>
									<th><a href="eliminarCliente.php?pro=<?php print $row[0]; ?>"><img src="img/Icon-trash.png" id="modificar"></a></th>
								</tr><?php
							}
						}
					}
				?>
			</table>
	</body>
</html>