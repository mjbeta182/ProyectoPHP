<?php
if(!isset($_SESSION)){
    session_start();
}
include('../clases/conexion.php');
$cod	= (isset($_REQUEST['cod'])?$_REQUEST['cod']:null);
$txtEmail	= (isset($_REQUEST['txtEmail'])?$_REQUEST['txtEmail']:null);
$txtClave   	= (isset($_REQUEST['txtClave'])?$_REQUEST['txtClave']:null); 
$_SESSION['persona']  = 'Acceder Registrarse';
//CUANDO INICIE SESION YA NO PODRA TENER HABILITADO EL REGISTRARSE
if (isset($_REQUEST['btnIngresar']))
{

		print "CONSULTANDO DATOS DE USUARIO";
		 $sqlConsulta = "SELECT * FROM tblusuario 
		 WHERE email ='$txtEmail' AND contrasena='$txtClave'";
		 $resultado =  $bdConexion->ejecutarSql($sqlConsulta);
		 $idTipo = 0;
		while($fila = mysqli_fetch_array($resultado))
		{
			$idTipo = $fila['idTipoUsuario'];
			$idUsuario = $fila['idUsuario'];
			$idPersona = $fila['idPersona'];
			$_SESSION['usuario'] = $txtEmail;
			$_SESSION['id'] = $idUsuario;
			print $idTipo;
		}
		$sqlConsulta = "SELECT nombre FROM tblpersona 
			 WHERE idPersona =$idPersona";
			 $resultado =  $bdConexion->ejecutarSql($sqlConsulta);
			while($fila = mysqli_fetch_array($resultado))
			{
				$nombre = $fila['nombre'];
				$_SESSION['persona'] = $nombre;
			}
		if($idTipo == 3)
		{
			 
			header("location:../index.php");
		}
		else{
			header("location:../formularios/frmLibros.php");
		}
}//Fin de boton Ingresar

?>