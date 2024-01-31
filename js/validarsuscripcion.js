// JavaScript Document
function validarsuscripcion(formulario) {
    if ((formulario.email_address.value.indexOf ('@', 0) == -1)||(formulario.email_address.value.length < 5)) { 
    alert("Escriba una dirección de correo válida."); 
    return (false); 
  }
  return (true); 
}