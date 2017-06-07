<!DOCTYPE>
<html lang="en">
<?php
session_start();
if ((isset($_SESSION['persona'])) && (isset($_SESSION['id']))) {

	$idusuario = $_SESSION['id'];
	$usuario = $_SESSION['persona'];
	// print $_SESSION['persona'].$_SESSION['id'];
	$dir = 'formularios/perfil.php';
	// print 'sesion exitosa';
}else{
	print 'fail la sesion';
	$usuario = 'Acceder Registrarse';
	$dir = '../formularios/frmAcceder.php';
}
include('../plantilla/plantillaCliente.php');
include('../procesos/catalogoLibros.php');
$titulo = 'LIBRARY';
$puntos = '../';
$PantallaCliente = new PantallaCliente($titulo,$puntos,$usuario,$dir);
$PantallaCliente->header();
$PantallaCliente->barraMenu();
$PantallaCliente->slide();
?>
<!--///////////CATALOGO DE LIBROS ////////////-->
	<div class="row3">
		<div class="col-md-12">
			<h3 class="text-center text-muted" id="heading">
				<strong>RECOMENDADOS</strong>
			</h3>
		</div>
	</div>
	<div class="row3">
		<div class="col-md-12">
			<?php catalogo($bdConexion); ?>
		</div>
	</div>
<?php
$PantallaCliente->presentacion();
$PantallaCliente->footer();
?>
</html>