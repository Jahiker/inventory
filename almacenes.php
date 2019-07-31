<?php  
	session_start();
	include('conexion.php');
	$sql="SELECT * FROM almacen";
	$query=mysqli_query($link,$sql);
	$resultados=mysqli_num_rows($query);
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
		?>
		<table align="center" border="0" id="menu">
			<?php  
				if ($resultados==0) { ?>
					<tr>
						<th width="50"><a href="crearAlmacen.php"><img src="img/add_77928.png" id="icono"></a></th>
					</tr>
					<tr>
						<th>CREAR ALMACEN</th>
					</tr><?php
				} else { ?>
					<tr>
						<?php
							while ($row=mysqli_fetch_array($query)) { ?>
								<th><a href="inventarioAlmacen.php?pro=<?php print $row[1] ?>"><img src="img/Almacen.png" id="icono"></a><br><p><?php echo $row['nombre']; ?></p></th><?php
							} ?>
							<th width="50"><a href="crearAlmacen.php"><img src="img/add_77928.png" id="icono"></a><br><p>CREAR ALMACEN</p></th>
						<?php
				} ?>
		</table>
	</body>
</html>