// JavaScript Document
function validar(formulario) {
  if (formulario.nombre.value == "Ingrese su nombre...") {
    alert("Escriba su nombre.");
    return (false);
  }
  
  if (formulario.apellido.value == "Ingrese su apellido...") {
    alert("Escriba su apellido.");
    return (false);
  }
  
  if ((formulario.email.value.indexOf ('@', 0) == -1)||(formulario.email.value.length < 5)) { 
    alert("Escriba una dirección de correo válida."); 
    return (false); 
  }

  if (formulario.textarea.value == "Ingrese su consulta...") {
    alert("Escriba su consulta.");
    return (false);
  }

  return (true); 
}