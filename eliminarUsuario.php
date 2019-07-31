<?php
	session_start();
	include('conexion.php');
	$sql="DELETE FROM usuario WHERE id_usuario='$_GET[pro]'";
	$query=mysqli_query($link,$sql)or die(mysqli_error($link));
?>
<script type="text/javascript">
	 alert("Usuario eliminado exitosamente!");
</script>
<meta http-equiv="refresh" content="0,URL=listaUsuarios.php">
