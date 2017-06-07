// // JavaScript Document
// 	function validar()
// 	{
// 		correlativo	=	$('#txtCorrelativo').val();
// 		Fecha		=	$('#txtFecha').val();
// 		cliente		=	$('#slcCliente').val();
// 		vendedor	=	$('#slcVendedor').val();
// 		producto	=	$('#slcProducto').val();
// 		cantidad	=	$('#txtCantidad').val();
// 		precio		=	$('#txtPrecio').val();
		
// 		var mensaje		=	'Favor de completar y/o corregir los siguiente campos:'+'\n\n';
// 		var error		=	0;
// 		if (correlativo == 0)	{  mensaje+= " - Correlativo de factura "+"\n"; error=1; }
// 		if (Fecha 		== '')	{  mensaje+= " - Fecha "+"\n"; error=1; }
// 		if (cliente 	== '0')	{  mensaje+= " - Cliente "+"\n"; error=1; }
// 		if (vendedor 	== '0')	{  mensaje+= " - Vendedor "+"\n"; error=1; }
// 		if (producto 	== '0')	{  mensaje+= " - Producto a ingresar "+"\n"; error=1; }
// 		if (cantidad 	== '' || eval(cantidad) <= 0) {  mensaje+= " - Cantidad "+"\n"; error=1; }
// 		if (precio 		== '' || eval(precio) <= 0)	{  mensaje+= " - Precio de producto "+"\n"; error=1; }

// 		if (error==1)
// 		{
// 			alert(mensaje);
// 			return false;
// 		}else{
// 				document.forms[0].action='';
// 				return true;
// 			}
// 	}
//************************************************************************************************
/*Funcion usada para aceptar solo numeros*/
function decimal(e)
{
	if(window.event)
		var keynum = e.keyCode
	else if(e.which)

	var keynum = e.which
	if (keynum > 33 && (keynum < 48 || keynum > 57) && keynum!=46)
	return false;
}
//************************************************************************************************
function confirmar()
{
  //Confirmacion de la acción a realizar.
  var confirmacion = confirm ("Finalizar Factura");
  
  if (confirmacion)
  {
	  window.location.href="index.php";
  }

  return false;
}//Fin de función

//************************************************************************************************
function eliminarItem()
{
	return confirm("¿Desea eliminar el registro seleccionado?")
}//function
//************************************************************************************************
function actualizarItem()
{
	var accion =	$('#accion').val();
  
  if (accion == "update")
  {
	 return confirm("¿Desea actualizar el registro seleccionado?")
  }
}//function

//************************************************************************************************
function frmImprimir()
{
    var id	=	$('#hfacturaId').val();
	window.open('../reportes/rptFactura.php?facturaId='+id,'Vista');
}
//************************************************************************************************
function LimpiarTipoUsuario()
{
   accion	=	$('#accion').val("insert");
   codigo   =	$('#hCodigo').val(null);
   tipo		=	$('#txtTipo').val(null);

}
function LimpiarEmpleado()
{
   accion		=	$('#accion').val("insert");
   codigo   	=	$('#hCodigo').val(null);
   nombre		=	$('#txtNombre').val(null);
   telefono		=	$('#txtTelefono').val(null);
   direccion	=	$('#txtDireccion').val(null);
   email		=	$('#txtEmail').val(null);
   contrasena	=	$('#txtContrasena').val(null);
}
