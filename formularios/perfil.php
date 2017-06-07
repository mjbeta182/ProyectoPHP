<!DOCTYPE>
<html lang="en">
<?php
session_start();

if ((isset($_SESSION['usuario'])) && (isset($_SESSION['persona'])) && (isset($_SESSION['id'])))
{
  $idusuario = $_SESSION['id'];
  $usuario = $_SESSION['persona'];
  $dir = 'formularios/perfil.php';
  print 'sesion exitosa';
}else{
  print 'fail la sesion';
  $usuario = 'Acceder Registrarse';
  $dir = 'index.php';
}
//Archivo que tiene la pantalla y estilo por parte del cliente
include('../plantilla/plantillaCliente.php');
include('../procesos/perfilUsuario.php');
$titulo = 'Acceder / Registrarse';
$puntos = '../';
$PantallaCliente = new PantallaCliente($titulo,$puntos,$usuario,$dir);
$PantallaCliente->header();
$PantallaCliente->barraMenu();
?>
<!--///////////FORMULARIO DE LOGIN Y REGISTRO////////////-->
	<div class="row3">
		<div class="col-md-12">
			<h3 class="text-center text-muted" id="heading">
				<strong>MI PERFIL </strong>
			</h3>
		</div>
	</div>
  <div class="row3">
     <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 form-wrap">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Datos Personales</a></li>
        <li role="presentation"><a href="#register" aria-controls="register" role="tab" data-toggle="tab">Prestamos</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="login">
          <h3>DATOS PERSONALES</h3>
          <hr>  
            <div class="col-md-12">  
            <table border="1" class="tabla" style="width:100%;">
              <?php mostrarDatos($bdConexion,$idusuario); ?>
            </table>
           </div>
           <!--  <label class="sr-only" for="user">Email</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control" id="txtEmail" name="txtEmail" value="<?=$txtEmail?>" placeholder="Email">
              <input type="hidden" id="cod" name="cod" value="<?=$cod?>" >
            </div>
            <br>
            <label class="sr-only" for="inputPassword">Contraseña</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control" id="txtClave" name="txtClave" placeholder="Contraseña" value="<?=$txtClave?>">
            </div>
            <button type="submit" class="btn btn-warning" name="btnIngresar" id="btnIngresar" >Ingresar</button> -->
          </form>
        </div>
        <!---->
        <div role="tabpanel" class="tab-pane" id="register">
          <h3>PRESTAMOS</h3>
          <hr>
          <form role="form">
            <label class="sr-only" for="user">Nombre</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" id="user" placeholder="Nombre Completo" data-original-title="" title="">
            </div>
            <br>
            <label class="sr-only" for="user">Direccion</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
              <input type="text" class="form-control" id="user" placeholder="Direccion" data-original-title="" title="">
            </div>
            <br>
            <label class="sr-only" for="user">Telefono</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="text" class="form-control" id="user" placeholder="Telefono" data-original-title="" title="">
            </div>
            <br>
            <label class="sr-only" for="email">Email</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control" id="email" placeholder="Email" data-original-title="" title="">
            </div>
            <br>
            <label class="sr-only" for="inputPassword">Contraseña</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control" id="password" placeholder="Contraseña">
            </div>
            <br>
            <button type="submit" class="btn btn-warning">Registrarse</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
$PantallaCliente->footer();
?>
</html>