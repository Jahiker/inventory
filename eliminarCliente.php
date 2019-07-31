<?php
	session_start();
	include('conexion.php');
	$sql="DELETE FROM cliente WHERE id_cliente='$_GET[pro]'";
	$query=mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script type="text/javascript">
	 alert("Cliente eliminado exitosamente!");
</script>
<meta http-equiv="refresh" content="0,URL=listaClientes.php">
