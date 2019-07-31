<?php  
	include('conexion.php');
	if (isset($_POST['orden']) && $_POST['orden']!='' && isset($_POST['producto']) && $_POST['producto']!='' && isset($_POST['nombre']) && $_POST['nombre']!='' && isset($_POST['descripcion']) && $_POST['descripcion']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='' && isset($_POST['almacen']) && $_POST['almacen']!='' && isset($_POST['cantidadDisponible']) && $_POST['cantidadDisponible']!='') {
		$orden=$_POST['orden'];
		$producto=$_POST['producto'];
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$almacen=$_POST['almacen'];
		$cantidad=$_POST['cantidad'];
		$cantidadDisponible=$_POST['cantidadDisponible'];
		if ($cantidad>$cantidadDisponible) { ?>
			<script type="text/javascript">
				alert('La cantidad ingresada supera el inventario disponible!');
			</script>
			<meta http-equiv="refresh" content="0;URL=inventarioSalida.php?pro=<?php print $orden; ?>"><?php
		} else {
			$sql1="SELECT * FROM mercancia WHERE nombre='$nombre' AND id_orden='$orden'";
			$query1=mysqli_query($link,$sql1);
			$resultados1=mysqli_num_rows($query1);
			$row1=mysqli_fetch_array($query1);
			$cantidad1=$row1['cantidad'];
			$cantidadTotal=$cantidad1+$cantidad;
			if ($resultados1==0) {
				$sql="INSERT INTO mercancia (id_orden,id_producto,cantidad,nombre,descripcion,almacen) VALUES('$orden','$producto','$cantidad','$nombre','$descripcion','$almacen')";
				$query=mysqli_query($link,$sql)or die(mysqli_error($link));
				if (mysqli_error($link)) { ?>
					<script type="text/javascript">
						alert('Error en el registro de mercancia!');
					</script><?php
				} else {
						$sql2="SELECT * FROM producto WHERE nombre='$nombre' AND almacen='$almacen'";
						$query2=mysqli_query($link,$sql2)or die(mysqli_error($link));
						$row2=mysqli_fetch_array($query2);
						$cantidad2=$row2['cantidad']-$cantidad;
						$sql4="UPDATE producto SET cantidad='$cantidad2' WHERE id_producto='$producto'";
						$query4=mysqli_query($link,$sql4)or die(mysqli_error($link));
						if (mysqli_error($link)) { ?>
							<script type="text/javascript">
								alert('Error en el registro de mercancia!');
							</script><?php
						} else { ?>
							<script type="text/javascript">
								alert('Producto agregado a la orden!');
							</script><?php
						}
					} ?>
					<meta http-equiv="refresh" content="0;URL=inventarioSalida.php?pro=<?php print $orden; ?>"><?php
			} else {
				$sql="UPDATE mercancia SET cantidad='$cantidadTotal' WHERE id_producto='$producto' AND almacen='$almacen'";
				$query=mysqli_query($link,$sql)or die(mysqli_error($link));
				if (mysqli_error($link)) { ?>
					<script type="text/javascript">
						alert('Error en el registro de mercancia!');
					</script><?php
				} else {
						$sql2="SELECT * FROM producto WHERE nombre='$nombre' AND almacen='$almacen'";
						$query2=mysqli_query($link,$sql2)or die(mysqli_error($link));
						$row2=mysqli_fetch_array($query2);
						$cantidad2=$row2['cantidad']-$cantidad;
						$sql4="UPDATE producto SET cantidad='$cantidad2' WHERE id_producto='$producto'";
						$query4=mysqli_query($link,$sql4)or die(mysqli_error($link));
						if (mysqli_error($link)) { ?>
							<script type="text/javascript">
								alert('Error en el registro de mercancia!');
							</script><?php
						} else { ?>
							<script type="text/javascript">
								alert('Producto agregado a la orden!');
							</script><?php
						}
					} ?>
					<meta http-equiv="refresh" content="0;URL=inventarioSalida.php?pro=<?php print $orden; ?>"><?php
			}	
		}
	} else { ?>
		<script type="text/javascript">
			alert('Error en la recepcion de los datos!');
		</script>
		<meta http-equiv="refresh" content="0;URL=inventarioSalida.php?pro=<?php print $orden; ?>"><?php
	}
?>   