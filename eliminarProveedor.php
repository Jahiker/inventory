<?php
	session_start();
	include('conexion.php');
	$sql="DELETE FROM proveedor WHERE id_proveedor='$_GET[pro]'";
	$query=mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script type="text/javascript">
	 alert("Proveedor eliminado exitosamente!");
</script>
<meta http-equiv="refresh" content="0,URL=listaProveedores.php">
