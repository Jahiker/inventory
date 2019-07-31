<?php
	session_start();
	include('conexion.php');
	$sql="DELETE FROM producto WHERE id_producto='$_GET[pro]'";
	$query=mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script type="text/javascript">
	 alert("Producto eliminado exitosamente!");
</script>
<meta http-equiv="refresh" content="0,URL=listaProductos.php">
