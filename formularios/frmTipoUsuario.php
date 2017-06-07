<!DOCTYPE>
<html lang="en">
<?php
include('../plantilla/plantillaMantenimiento.php');
include('../procesos/tipoUsuario.php');
$titulo = 'Tipo Usuario';
$puntos = '../';
$PantallaCliente = new PantallaMantenimiento($titulo,$puntos);
$PantallaCliente->header();
$PantallaCliente->barraMenu();
?>
<!--///////////FORMULARIO DE LOGIN Y REGISTRO////////////-->
<div class="container-fluid">
	<div class="row3">
		 <div class="col-md-4">
          <h3 class=" text-center text-muted" id="heading">
        <strong> TIPO DE USUARIO</strong>
      </h3>
          <form role="form" class="formulario" action="#" method="post">
           <div class="input-group" id="busqueda">
              <input type="text" class="form-control" id="txtBuscar" name="txtBuscar" placeholder="Buscar">
               <span class="input-group-addon" id="spanSearch">
               <button type="submit" class="fa fa-search"></button>
               </span>
            </div>
          <label class="sr-only" for="user">Codigo</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="  fa fa-lock"></i></span>
              <input type="text" class="form-control" id="hCodigo" name="hCodigo" placeholder="Codigo" readonly="" value="<?=$hCodigo?>">
            </div>
            <br>
            <label class="sr-only" for="user">Tipo de Usuario</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" id="txtTipo" name="txtTipo" placeholder="Nombre" value="<?=$txtTipo?>" required="true">
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-warning" onclick='LimpiarTipoUsuario();'>Nuevo</button>
            <button id="btnGuardar" name="btnGuardar" type="submit" class="btn btn-warning" onclick='return actualizarItem();'>Guardar</button>
            <input type="hidden" id="accion" name="accion" value="<?=$accion?>" >
            <button type="submit" class="btn btn-warning">Imprimir Reporte</button>
            <button type="submit" class="btn btn-warning">Cancelar</button>
          </form>
        </div><!--fin de col-md-4-->
        <div class="col-md-8">  
            <table border="1" class="tabla">
              <?php mostrarDatos($bdConexion,$hCodigo,$txtTipo); ?>
            </table>
      </div>
    </div><!--fin de row-->
  </div>
<?php
$bdConexion->desconectar(); 
?>
</html>