<?php  
	session_start();
	include('conexion.php');
	if (isset($_POST['opcion'])) {
		switch ($_POST['opcion']) {

			case '1': //REGISTRO DE USUARIOS
				if (isset($_POST['nombre']) && $_POST['nombre']!='' && isset($_POST['apellido']) && $_POST['apellido']!='' && isset($_POST['usuario']) && $_POST['usuario']!='' && isset($_POST['clave']) && $_POST['clave']!='' && isset($_POST['clave1']) && $_POST['clave1']!='' && isset($_POST['sexo']) && $_POST['sexo']!='') {
					if ($_POST['clave']!=$_POST['clave1']) { ?>
						<script type="text/javascript">
							alert('Las contraseas no coinciden!');
						</script><?php
					} else {
						$sql="INSERT INTO usuario (nombre,apellido,usuario,clave,sexo) VALUES('$_POST[nombre]','$_POST[apellido]','$_POST[usuario]','".md5($_POST['clave'])."','$_POST[sexo]')";
						mysqli_query($link,$sql)or die(mysqli_error($link));
						if (mysqli_error($link)) { ?>
							<script type="text/javascript">
								alert("Error en registro, intente nuevamente! <?php echo mysqli_error($link); ?>");
							</script><?php
						} else { ?>
							<script type="text/javascript">
								alert("Registro exitoso!");
							</script>
							<meta http-equiv="refresh" content="0,URL=listaUsuarios.php"><?php
						}
						
					}
					
				} else { ?>
					<script type="text/javascript">
						alert('Debe llenar todos los campos!');
					</script>
					<meta http-equiv="refresh" content="0,URL=registro.php"><?php				
				}
				
				break;

			case '2': //VALIDACION DE DATOS E INICIO DE SESSION
				if (isset($_POST['usuario']) && $_POST['usuario']!='' && isset($_POST['clave']) && $_POST['clave']!='') {
					$sql="SELECT * FROM usuario WHERE usuario='$_POST[usuario]'";
					$query=mysqli_query($link,$sql);
					$resultados=mysqli_num_rows($query);
					if ($resultados==0) { ?>
						<script type="text/javascript">
							alert("Usuario no existente! <?php echo mysqli_error($link) ?>");
						</script>
						<meta http-equiv="refresh" content="0,URL=index.php"><?php
					} else {
						$row=mysqli_fetch_array($query);
						if ($row['clave']!=md5($_POST['clave'])) { ?>
							<script type="text/javascript">
								alert("Contraseña incorrecta!");
							</script>
							<meta http-equiv="refresh" content="0,URL=index.php"><?php
						} else {
							$_SESSION['id_usuario']=$row['id_usuario'];
							$_SESSION['nombre']=$row['nombre'];
							$_SESSION['apellido']=$row['apellido'];
							$_SESSION['sexo']=$row['sexo']; ?>
							<meta http-equiv="refresh" content="0,URL=home.php"><?php
						}						
					}	
				} else { ?>
					<script type="text/javascript">
						alert('Debe llenar todos los datos!');
					</script>
					<meta http-equiv="refresh" content="0,URL=index.php"><?php
				}
				break;

			case '3': //MODIFICAR USUARIOS
				if (isset($_POST['nombre']) && $_POST['nombre']!='' && isset($_POST['apellido']) && $_POST['apellido']!='' && isset($_POST['usuario']) && $_POST['usuario']!='' && isset($_POST['sexo']) && $_POST['sexo']!='') {
					$sql="UPDATE usuario SET nombre='$_POST[nombre]',apellido='$_POST[apellido]',sexo='$_POST[sexo]' WHERE id_usuario='$_POST[id_usuario]'";
					mysqli_query($link,$sql)or die(mysqli_error($link));
					if (mysqli_error($link)) { ?>
						<script type="text/javascript">
							alert("Error en modificacion, intente nuevamente! <?php echo mysqli_error($link); ?>");
						</script><?php
					} else { ?>
						<script type="text/javascript">
							alert("Modificacion exitosa!");
						</script>
						<meta http-equiv="refresh" content="0,URL=listaUsuarios.php"><?php
					}
				} else { ?>
					<script type="text/javascript">
						alert('Debe llenar todos los campos!');
					</script>
					<meta http-equiv="refresh" content="0,URL=listaUsuarios.php"><?php				
				}
				break;

			case '4': //REGISTRO DE ALMACENES
				if (isset($_POST['nombre']) && $_POST['nombre']!='' && isset($_POST['direccion']) && $_POST['direccion']!='') {
					$sql="INSERT INTO almacen (nombre,direccion) VALUES('$_POST[nombre]','$_POST[direccion]')";
					$query=mysqli_query($link,$sql)or die(mysqli_error($link));
					if (mysqli_error($link)) { ?>
						<script type="text/javascript">
							alert('Error al crear almacen, intente nuevamente!');
						</script>
						<meta http-equiv="refresh" content="0;URL=crearAlmacen.php"><?php
					} else { ?>
						<script type="text/javascript">
							alert('Almacen creado exitosamente!');
						</script>
						<meta http-equiv="refresh" content="0;URL=almacenes.php"><?php
					}					
				} else { ?>
					<script type="text/javascript">
						alert('Debe llenar todos los datos!');
					</script>
					<meta http-equiv="refresh" content="0;URL=crearAlmacen.php"><?php
				}
				break;

			case '5': //CREACION DE CATEGORIA DE PRODUCTOS
				if (isset($_POST['categoria']) && $_POST['categoria']!='' && isset($_POST['descripcion']) && $_POST['descripcion']!='') {
					$sql="INSERT INTO categoria (categoria,descripcion) VALUES('$_POST[categoria]','$_POST[descripcion]')";
					$query=mysqli_query($link,$sql)or die(mysqli_error($link));
					if (mysqli_error($link)) { ?>
						<script type="text/javascript">
							alert("Error al crear categoria, intente nuevamente!");
						</script>
						<meta http-equiv="refresh" content="0;URL=crearCategoria.php">
						<?php
					} else { ?>
						<script type="text/javascript">
							alert("Categoria creada exitosamente!");
						</script>
						<meta http-equiv="refresh" content="0;URL=productos.php"><?php
					}	
				} else { ?>
					<script type="text/javascript">
						alert('Debe llenar todos los datos');
					</script>
					<meta http-equiv="refresh" content="0;URL=crearCategoria.php"><?php
				}
				
				break;

			case '6': //REGISTRO DE PRODUCTOS
				if (isset($_POST['nombre']) && $_POST['nombre']!='' && isset($_POST['descripcion']) && $_POST['descripcion']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='' && isset($_POST['precio']) && $_POST['precio']!='' && isset($_POST['categoria']) && $_POST['categoria']!='' && isset($_FILES['imagen']['name']) && $_FILES['imagen']['name']!='') {
					$temporal=$_FILES['imagen']['tmp_name'];
					$arch=$_FILES['imagen']['name'];
					$tipo=getimagesize($temporal);
					if ($tipo[2]!=1 && $tipo[2]!=2 && $tipo[2]!=3) { ?>
						<script type="text/javascript">
							alert("Formato de imagen no permitido!");
						</script>
						<meta http-equiv="refresh" content="0;URL=cargarProductos.php"><?php
					} else {
						if (copy($temporal,'img/'.$arch)) {
							$sql="INSERT INTO producto (nombre,descripcion,categoria,cantidad,precio,almacen,imagen) VALUES('$_POST[nombre]','$_POST[descripcion]','$_POST[categoria]','$_POST[cantidad]','$_POST[precio]','','$arch')";
							$query=mysqli_query($link,$sql)or die(mysqli_error($link));
							if (mysqli_error($link)) { ?>
								<script type="text/javascript">
									alert("Error al cargar el producto al sistema! <?php echo mysqli_error($link); ?>");
								</script>
								<meta http-equiv="refresh" content="0;URL=cargaProductos.php"><?php
							} else { ?>
								<script type="text/javascript">
									alert("Producto registrado exitosamente!");
								</script>
								<meta http-equiv="refresh" content="0;URL=listaProductos.php"><?php
							}
						} else { ?>
							<script type="text/javascript">
								alert("Error al cargar imagen, intente nuevamente!");
							</script>
							<meta http-equiv="refresh" content="0;URL=cargaProductos.php"><?php
						}	
					}
				} else { ?>
					<script type="text/javascript">
						alert('Debe llenar todos los datos!');
					</script>
					<meta http-equiv="refresh" content="0;URL=cargaProductos.php"><?php
				}
			break;

			case '7': //MODIFICACION DE PRODUCTOS
				if (isset($_FILES['imagen']['name']) && $_FILES['imagen']['name']!='') {
					$temporal=$_FILES['imagen']['tmp_name'];
					$arch=$_FILES['imagen']['name'];						
					$tipo=getimagesize($temporal);
					if ($tipo[2]!=1 && $tipo[2]!=2 && $tipo[2]!=3) { ?>
						<script type="text/javascript">
							alert("Formato de imagen no permitido!");
						</script>
						<meta http-equiv="refresh" content="0;URL=editarProductos.php"><?php
					} else {
						if (copy($temporal,'img/'.$arch)) {								
							$sql="UPDATE producto SET nombre='$_POST[nombre]',descripcion='$_POST[descripcion]',precio='$_POST[precio]',categoria='$_POST[categoria]',imagen='$arch' WHERE id_producto='$_POST[id_producto]'";
							$query=mysqli_query($link,$sql)or die(mysqli_error($link));
							if (mysqli_error($link)) { ?>
								<script type="text/javascript">
									alert("Error al editar el producto! <?php echo mysqli_error($link); ?>");
								</script>
								<meta http-equiv="refresh" content="0;URL=editarProductos.php"><?php
							} else { ?>
								<script type="text/javascript">
									alert("Producto editado exitosamente!");
								</script>
								<meta http-equiv="refresh" content="0;URL=listaProductos.php"><?php
							}
						} else { ?>
						<script type="text/javascript">
							alert("Error al cargar imagen, intente nuevamente!");
						</script>							<meta http-equiv="refresh" content="0;URL=editarProductos.php"><?php
						}
					}
				} else {
					$sql="UPDATE producto SET nombre='$_POST[nombre]',descripcion='$_POST[descripcion]',precio='$_POST[precio]',categoria='$_POST[categoria]' WHERE id_producto='$_POST[id_producto]'";
					$query=mysqli_query($link,$sql)or die(mysqli_error($link));
					if (mysqli_error($link)) { ?>
						<script type="text/javascript">
							alert("Error al editar el producto! <?php echo mysqli_error($link); ?>");
						</script>
						<meta http-equiv="refresh" content="0;URL=editarProductos.php"><?php
					} else { ?>
						<script type="text/javascript">
							alert("Producto editado exitosamente!");
						</script>
						<meta http-equiv="refresh" content="0;URL=listaProductos.php"><?php
						}
				}
				break;

			case '8': //REGISTRO DE CLIENTES Y PROVEEDORES
				if ($_POST['tipo']=='cliente') {
					if (isset($_POST['nombre']) && $_POST['nombre']!='' && isset($_POST['rif']) && $_POST['rif']!='' && isset($_POST['direccion']) && $_POST['direccion']!='' && isset($_POST['telefono']) && $_POST['telefono']!='' && isset($_POST['contacto']) && $_POST['contacto']!='') {
						$sql="INSERT INTO cliente (nombre,rif,direccion,telefono,contacto) VALUES('$_POST[nombre]','$_POST[rif]','$_POST[direccion]','$_POST[telefono]','$_POST[contacto]')";
						$query=mysqli_query($link,$sql)or die(mysqli_error($link));
						if (mysqli_error($link)) { ?>
							<script type="text/javascript">
								alert("Error en registro! intente nuevamente! <?php echo mysqli_error($link); ?>");
							</script>
							<meta http-equiv="refresh" content="0;URL=RegistroClientesProveedores.php"><?php
						} else { ?>
							<script type="text/javascript">
								alert("Cliente registrado exitosamente!");
							</script>
							<meta http-equiv="refresh" content="0;URL=ListaClientes.php"><?php
						}
					} else { ?>
						<script type="text/javascript">
							alert('Debe llenar todos los datos!');
						</script>
						<meta http-equiv="refresh" content="0;URL=RegistroClientesProveedores.php"><?php
					}
				} else {
					if (isset($_POST['tipo']) && $_POST['tipo']!='' && isset($_POST['nombre']) && $_POST['nombre']!='' && isset($_POST['rif']) && $_POST['rif']!='' && isset($_POST['direccion']) && $_POST['direccion']!='' && isset($_POST['telefono']) && $_POST['telefono']!='' && isset($_POST['contacto']) && $_POST['contacto']!='') {
						$sql="INSERT INTO proveedor (nombre,rif,direccion,telefono,contacto) VALUES('$_POST[nombre]','$_POST[rif]','$_POST[direccion]','$_POST[telefono]','$_POST[contacto]')";
						$query=mysqli_query($link,$sql)or die(mysqli_error($link));
						if (mysqli_error($link)) { ?>
							<script type="text/javascript">
								alert("Error en registro! intente nuevamente! <?php echo mysqli_error($link); ?>");
							</script>
							<meta http-equiv="refresh" content="0;URL=RegistroClientesProveedores.php"><?php
						} else { ?>
							<script type="text/javascript">
								alert("Proveedor registrado exitosamente!");
							</script>
							<meta http-equiv="refresh" content="0;URL=ListaProveedores.php"><?php
						}
					} else { ?>
						<script type="text/javascript">
							alert('Debe llenar todos los datos!');
						</script>
						<meta http-equiv="refresh" content="0;URL=RegistroClientesProveedores.php"><?php
					}
				}
				
				break;

			case '9': //EDITAR DATOS DE CLIENTES
				if (isset($_POST['id_cliente']) && $_POST['id_cliente']!=0 && isset($_POST['nombre']) && $_POST['nombre']!='' && isset($_POST['rif']) && $_POST['rif']!='' && isset($_POST['direccion']) && $_POST['direccion']!='' && isset($_POST['telefono']) && $_POST['telefono']!='' && isset($_POST['contacto']) && $_POST['contacto']!='') {
					$sql=" UPDATE cliente SET nombre='$_POST[nombre]',rif='$_POST[rif]',direccion='$_POST[direccion]',telefono='$_POST[telefono]',contacto='$_POST[contacto]' WHERE id_cliente='$_POST[id_cliente]' ";
					$query=mysqli_query($link,$sql)or die(mysqli_error($link));
					if (mysqli_error($link)) { ?>
						<script type="text/javascript">
							alert("Error! No se guardaron los cambios <?php echo mysqli_error($link); ?>");
						</script>
						<meta http-equiv="refresh" content="0;URL=editarCliente.php"><?php
					} else { ?>
						<script type="text/javascript">
							alert("Se guardaron los cambios exitosamente!");
						</script>
						<meta http-equiv="refresh" content="0;URL=ListaClientes.php"><?php
						}
				} else { ?>
					<script type="text/javascript">
						alert('Debe llenar todos los datos!');
					</script>
					<meta http-equiv="refresh" content="0;URL=editarCliente.php"><?php
				}
				break;

			case '10': //EDITAR DATOS DE PROVEEDORES
				if (isset($_POST['id_proveedor']) && $_POST['id_proveedor']!=0 && isset($_POST['nombre']) && $_POST['nombre']!='' && isset($_POST['rif']) && $_POST['rif']!='' && isset($_POST['direccion']) && $_POST['direccion']!='' && isset($_POST['telefono']) && $_POST['telefono']!='' && isset($_POST['contacto']) && $_POST['contacto']!='') {
					$sql=" UPDATE proveedor SET nombre='$_POST[nombre]',rif='$_POST[rif]',direccion='$_POST[direccion]',telefono='$_POST[telefono]',contacto='$_POST[contacto]' WHERE id_proveedor='$_POST[id_proveedor]' ";
					$query=mysqli_query($link,$sql)or die(mysqli_error($link));
					if (mysqli_error($link)) { ?>
						<script type="text/javascript">
							alert("Error! No se guardaron los cambios <?php echo mysqli_error($link); ?>");
						</script>
						<meta http-equiv="refresh" content="0;URL=editarProveedor.php"><?php
					} else { ?>
						<script type="text/javascript">
							alert("Se guardaron los cambios exitosamente!");
						</script>
						<meta http-equiv="refresh" content="0;URL=ListaProveedores.php"><?php
						}
				} else { ?>
					<script type="text/javascript">
						alert('Debe llenar todos los datos!');
					</script>
					<meta http-equiv="refresh" content="0;URL=editarProveedor.php"><?php
				}
				break;

			case '11': //REGISTRAR UNA ORDEN DE ENTRADA
				if (isset($_POST['fecha']) && $_POST['fecha']!='' && isset($_POST['tipo']) && $_POST['tipo']!='' && isset($_POST['clienteProveedor']) && $_POST['clienteProveedor']!='' && isset($_POST['almacen']) && $_POST['almacen']!='' && isset($_POST['entrega']) && $_POST['entrega']!='' && isset($_POST['recibe']) && $_POST['recibe']!='') {
					$sql="SELECT * FROM proveedor WHERE nombre='$_POST[clienteProveedor]'";
					$query=mysqli_query($link,$sql)or die(mysqli_error($link));
					$row=mysqli_fetch_array($query);
					$sql1="INSERT INTO orden (tipo,fecha,cliente_proveedor,rif,direccion,almacen,entrega,recibe,estatus) VALUES('$_POST[tipo]','$_POST[fecha]','$row[nombre]','$row[rif]','$row[direccion]','$_POST[almacen]','$_POST[entrega]','$_POST[recibe]','En Proceso')";
					$query1=mysqli_query($link,$sql1)or die(mysqli_error($link));
					if (mysqli_error($link)) { ?>
						<script type="text/javascript">
							alert('Error en registro, intente nuevamente!');
						</script>
						<meta http-equiv="refresh" content="0;URL=ordenEntrada.php"><?php
					} else { ?>
						<script type="text/javascript">
							alert('Orden creada exitosamente!');
						</script>
						<meta http-equiv="refresh" content="0;URL=listaOrdenesEntrada.php"><?php
					}
				} else { ?>
					<script type="text/javascript">
						alert('Debe llenar todos los datos!');
					</script>
					<meta http-equiv="refresh" content="0;URL=ordenEntrada.php"><?php
				}
				
				break;

				case '12': //EDITAR UNA ORDEN DE ENTRADA
					if (isset($_POST['fecha']) && $_POST['fecha']!='' && isset($_POST['orden']) && $_POST['orden']!='' && isset($_POST['clienteProveedor']) && $_POST['clienteProveedor']!='' && isset($_POST['almacen']) && $_POST['almacen']!='' && isset($_POST['entrega']) && $_POST['entrega']!='' && isset($_POST['recibe']) && $_POST['recibe']!='') {
						$sql="SELECT * FROM proveedor WHERE nombre='$_POST[clienteProveedor]'";
						$query=mysqli_query($link,$sql)or die(mysqli_error($link));
						$row=mysqli_fetch_array($query);
						$sql1="UPDATE orden SET fecha='$_POST[fecha]',cliente_proveedor='$_POST[clienteProveedor]',rif='$row[rif]',direccion='$row[direccion]',almacen='$_POST[almacen]',entrega='$_POST[entrega]',recibe='$_POST[recibe]' WHERE id_orden='$_POST[orden]'";
						$query1=mysqli_query($link,$sql1)or die(mysqli_error($link));
						if (mysqli_error($link)) { ?>
							<script type="text/javascript">
								alert('No se guardaron los cambios, intente nuevamente!');
							</script>
							<meta http-equiv="refresh" content="0;URL=ordenEntrada.php"><?php
						} else { ?>
							<script type="text/javascript">
								alert('Se guardaron los cambios exitosamente!');
							</script>
							<meta http-equiv="refresh" content="0;URL=listaOrdenesEntrada.php"><?php
						}
					} else { ?>
						<script type="text/javascript">
							alert('Debe llenar todos los datos!');
						</script>
						<meta http-equiv="refresh" content="0;URL=ordenEntrada.php"><?php
					}
					
					break;

				case '13': //REGISTRAR UNA ORDEN DE SALIDA
					if (isset($_POST['fecha']) && $_POST['fecha']!='' && isset($_POST['tipo']) && $_POST['tipo']!='' && isset($_POST['clienteProveedor']) && $_POST['clienteProveedor']!='' && isset($_POST['almacen']) && $_POST['almacen']!='' && isset($_POST['entrega']) && $_POST['entrega']!='' && isset($_POST['recibe']) && $_POST['recibe']!='') {
						$sql="SELECT * FROM cliente WHERE nombre='$_POST[clienteProveedor]'";
						$query=mysqli_query($link,$sql)or die(mysqli_error($link));
						$row=mysqli_fetch_array($query);
						$sql1="INSERT INTO orden (tipo,fecha,cliente_proveedor,rif,direccion,almacen,entrega,recibe,estatus) VALUES('$_POST[tipo]','$_POST[fecha]','$row[nombre]','$row[rif]','$row[direccion]','$_POST[almacen]','$_POST[entrega]','$_POST[recibe]','En Proceso')";
						$query1=mysqli_query($link,$sql1)or die(mysqli_error($link));
						if (mysqli_error($link)) { ?>
							<script type="text/javascript">
								alert('Error en registro, intente nuevamente!');
							</script>
							<meta http-equiv="refresh" content="0;URL=ordenSalida.php"><?php
						} else { ?>
							<script type="text/javascript">
								alert('Orden creada exitosamente!');
							</script>
							<meta http-equiv="refresh" content="0;URL=listaOrdenesSalida.php"><?php
						}
					} else { ?>
						<script type="text/javascript">
							alert('Debe llenar todos los datos!');
						</script>
						<meta http-equiv="refresh" content="0;URL=ordenSalida.php"><?php
					}
					
					break;

				case '14': //EDITAR UNA ORDEN DE SALIDA
					if (isset($_POST['fecha']) && $_POST['fecha']!='' && isset($_POST['orden']) && $_POST['orden']!='' && isset($_POST['clienteProveedor']) && $_POST['clienteProveedor']!='' && isset($_POST['almacen']) && $_POST['almacen']!='' && isset($_POST['entrega']) && $_POST['entrega']!='' && isset($_POST['recibe']) && $_POST['recibe']!='') {
						$sql="SELECT * FROM cliente WHERE nombre='$_POST[clienteProveedor]'";
						$query=mysqli_query($link,$sql)or die(mysqli_error($link));
						$row=mysqli_fetch_array($query);
						$sql1="UPDATE orden SET fecha='$_POST[fecha]',cliente_proveedor='$_POST[clienteProveedor]',rif='$row[rif]',direccion='$row[direccion]',almacen='$_POST[almacen]',entrega='$_POST[entrega]',recibe='$_POST[recibe]' WHERE id_orden='$_POST[orden]'";
						$query1=mysqli_query($link,$sql1)or die(mysqli_error($link));
						if (mysqli_error($link)) { ?>
							<script type="text/javascript">
								alert('No se guardaron los cambios, intente nuevamente!');
							</script>
							<meta http-equiv="refresh" content="0;URL=ordenSalida.php"><?php
						} else { ?>
							<script type="text/javascript">
								alert('Se guardaron los cambios exitosamente!');
							</script>
							<meta http-equiv="refresh" content="0;URL=listaOrdenesSalida.php"><?php
						}
					} else { ?>
						<script type="text/javascript">
							alert('Debe llenar todos los datos!');
						</script>
						<meta http-equiv="refresh" content="0;URL=ordenSalida.php"><?php
					}
					
					break;

				case '15': //PROCESAR UNA ORDEN
					if (isset($_POST['orden']) && $_POST['orden']!='') {
						$sql2="UPDATE orden SET estatus='Procesada' WHERE id_orden='$_POST[orden]'";
						$query2=mysqli_query($link,$sql2)or die(mysqli_error($link));
						if (mysqli_error($link)) { ?>
							<script type="text/javascript">
								alert('No se proceso la orden, intente nuevamente!');
							</script>
							<meta http-equiv="refresh" content="0;URL=ListaOrdenesEntrada.php"><?php
						} else { ?>
							<script type="text/javascript">
								alert('Orden procesada exitosamente!');
							</script>
							<meta http-equiv="refresh" content="0;URL=ListaOrdenesEntrada.php"><?php
						}				
					} else { ?>
						<script type="text/javascript">
							alert('No se recibio el numero de orden!');
						</script>
						<meta http-equiv="refresh" content="0;URL=ListaOrdenesEntrada.php"><?php
					}
							break;

						default:
							?><script type="text/javascript">
								alert('Accion no permitida!');
							</script><?php
					break;
		}
	}
?>