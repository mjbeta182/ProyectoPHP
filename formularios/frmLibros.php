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
  print $usuario;
}else{
  print 'fail la sesion';
  $usuario = 'Acceder Registrarse';
  $dir = 'index.php';
}
include('../plantilla/plantillaMantenimiento.php');
include('../procesos/libro.php');
$titulo = 'Libros';
$puntos = '../';
$PantallaCliente = new PantallaMantenimiento($titulo,$puntos,$usuario,$dir);
$PantallaCliente->header();
$PantallaCliente->barraMenu();
?>
<!--///////////FORMULARIO DE LOGIN Y REGISTRO////////////-->
<div class="container-fluid">
	<div class="row3" >
		 <div class="col-md-4">
          <h3 class=" text-center text-muted" id="heading">
        <strong>LIBROS</strong>
      </h3>
          <form role="form" class="formulario" action="#" method="post" enctype="multipart/form-data">
           <div class="input-group" id="busqueda">
              <input type="text" class="form-control" id="txtBuscar" name="txtBuscar" placeholder="Buscar">
               <span class="input-group-addon" id="spanSearch">
               <button type="submit" class="fa fa-search" style="height:32px;"></button>
               </span>
            </div>
          <label class="sr-only" for="user">Codigo</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="  fa fa-lock"></i></span>
              <input type="text" class="form-control" id="hCodigo" name="hCodigo" placeholder="Codigo" readonly="" value="<?=$hCodigo?>">
            </div>
            <br>
            <label class="sr-only" for="user">Titulo</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="  fa fa-user-circle"></i></span>
              <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="Titulo" value="<?=$txtTitulo?>" required="true">
            </div>
            <br>
            <label class="sr-only" for="user">Agregar Autores</label>
            <div class="input-group" >
              <?php
                $bdConexion->llenarSelect("slcAutor","SELECT * FROM tblautor ",
                  $slcAutor);
              ?>  
                 <span class="input-group-addon" id="spanSearch">
               <button type="submit" class="fa fa-plus" style="height:32px;"></button>
               </span>

            </div>
            <table  border="1px" style="width:100%;">
          
               <?php mostrarAutores($bdConexion,$hCodigo,$slcAutor); ?>
                  </table>

            <br>
            <label class="sr-only" for="user">Stock</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="text" class="form-control" id="txtStock" name="txtStock" placeholder="Stock" value="<?=$txtStock?>" required="true">
            </div>
            <br>
            <label class="sr-only" for="user">Descripcion</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="Descripcion" value="<?=$txtDescripcion?>" required="true">
            </div>
            <br>
             <br>
            <label class="sr-only" for="user">Editorial</label>
            <div class="input-group">
              <?php
                $bdConexion->llenarSelect("slcEditorial","SELECT * FROM tbleditorial ",$slcEditorial);
              ?>
            </div>
            <br>
            <label class="sr-only" for="user">Precio Costo</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control" id="txtCosto" name="txtCosto" placeholder="Precio" value="<?=$txtCosto?>" required="true">
            </div>
            <br>
            <label class="sr-only" for="user">Categoria</label>
            <div class="input-group">
              <?php
                $bdConexion->llenarSelect("slcCategoria","SELECT * FROM tblcategoria",$slcCategoria);
              ?>
            </div>
            <br>
             <label class="sr-only" for="user">Palabras Clave</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" id="txtPalabras" name="txtPalabras" placeholder="Palabras clave" value="<?=$txtPalabras?>" required="true">
            </div>
            <br>
            <!--############# SUBIR ARCHIVO ##############--> 
            <label class="sr-only" for="user">Imagen</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
              <input type="file" class="form-control"  id="archivo" name="archivo" value="Examinar">
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-warning" onclick='LimpiarEmpleado();'>Nuevo</button>
            <button id="btnGuardar" name="btnGuardar" type="submit" class="btn btn-warning" onclick='return actualizarItem();'>Guardar</button>
            <input type="hidden" id="accion" name="accion" value="<?=$accion?>" >
            <button type="submit" class="btn btn-warning">Imprimir Reporte</button>
            <button type="submit" class="btn btn-warning">Cancelar</button>
          </form>
        </div><!--fin de col-md-4-->
                <div class="col-md-8">  
            <table border="1" class="tabla" style="font-size:12px;">
              <?php mostrarDatos($bdConexion,$hCodigo,$txtTitulo ,$txtStock,$txtDescripcion,$txtPalabras,$txtCosto,$archivo,$slcEditorial,$slcCategoria); ?>
            </table>
      </div>
    </div><!--fin de row-->
  </div>
<?php
$bdConexion->desconectar(); 
?>
</html>