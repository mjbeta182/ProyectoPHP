
<?php
include('../clases/conexion.php');
function catalogo($bdConexion)
{
	$sqlMostrar = "SELECT 
						l.idLibro,
						l.titulo,
						l.stock,
						l.descripcion,
						l.precioCosto,
						l.palabrasClave,
						l.imagen,
						e.idEditorial,
						e.nombreEditorial,
						c.idCategoria,
						c.nombreCategoria
					FROM tbllibro l
					INNER JOIN tbleditorial e
						ON l.idEditorial= e.idEditorial 
					INNER JOIN tblcategoria c
						ON l.idCategoria = c.idCategoria";			
	$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);
	//Monstran detalle de registros
	while($fila = mysqli_fetch_array($rsMostrar))
	{
		print "
		<div class='col-md-2'>
		<article>
			<img class='image' src=".$fila['imagen'].">
			<div class='overlay'>
			<div class='col-sm-12 ' style='font-size:12px;color:white;margin-top:15px; '>
    			<p>".$fila['titulo']."</p>
    			 <p>".$fila['descripcion']."</p>
    		</div> 
    		<button type='submit' class='btn btn-warning'>Agregar</button>
   			</div>
		</article>		
		</div>
	";
		
	}//Fin While
}//Fin del metodo mostrar

// if (isset($_REQUEST['btnGuardar']))
// {
// 	if($_FILES['archivo']["error"] > 0)
// 	  {
// 		echo "Error: " . $_FILES['archivo']['error'] . "<br>";
// 	  }
// 	else
// 	  {
// 	  	$url = "../imagenes/portadas/";
// 		move_uploaded_file($_FILES['archivo']['tmp_name'],$url.$_FILES['archivo']['name']);
// 			$pathImage = $url.$_FILES['archivo']['name'];
// 	  }
// 	if ($accion=='insert')
// 		{
// 		print "INSERTAR";
// 		$tabla		= "tbllibro";
// 		$campos		= "idEditorial,idCategoria,titulo,stock,descripcion,precioCosto,palabrasClave,imagen";
// 		$valores	= "$slcEditorial,$slcCategoria,'$txtTitulo',$txtStock,'$txtDescripcion',$txtCosto,'$txtPalabras','$pathImage'";
// 		$bdConexion->insertarDB($tabla,$campos,$valores);
// 		}
// 		if ( $_REQUEST['accion']== 'update')
// 		{

// 			$tabla		= "tblpersona";
// 			$campos		= "nombre = '$txtNombre',telefono = '$txtTelefono',direccion = '$txtDireccion'";
// 			$condicion	= "idPersona = $hCodigo";
// 			$bdConexion->actualizarDB($tabla,$campos,$condicion);
// 			print 'EDITANDO';
// 			$tabla		= "tblusuario";
// 			$campos		= "idTipoUsuario  = $slcTipoUsuario, email = '$txtEmail', contrasena = '$txtContrasena'";
// 			$condicion	= "idPersona= $hCodigo";
// 			$bdConexion->actualizarDB($tabla,$campos,$condicion);
// 		}
// }//Fin de boton Guardar

// // if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='editar')
// // {
// // 	$accion = 'update';
// // }

// // if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='eliminar' and isset($_REQUEST['idUsuario']))
// // {
// // 		$delete = $_REQUEST['idUsuario'];
// // 		$tabla = "tblusuario";
// // 		$condicion = "idUsuario = $delete ";
// // 		$bdConexion->eliminarDB($tabla,$condicion);

// // 		$hCodigo = $_REQUEST['hCodigo'];
// // 		$tabla = "tblpersona";
// // 		$condicion = "idPersona =$hCodigo";
// // 		$bdConexion->eliminarDB($tabla,$condicion);
		
// // }//Fin de Eliminar

?>
