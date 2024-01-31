<?
/* aqui se incializan variables de PHP */
if (phpversion() >= "4.2.0") {
        if ( ini_get('register_globals') != 1 ) {
                $supers = array('_REQUEST',
                                '_ENV',
                                '_SERVER',
                                '_POST',
                                '_GET',
                                '_COOKIE',
                                '_SESSION',
                                '_FILES',
                                '_GLOBALS' );
                                                                                
                foreach( $supers as $__s) {
                        if ( (isset($$__s) == true) && (is_array( $$__s
) == true) ) extract( $$__s, EXTR_OVERWRITE );
                }
                unset($supers);
        }
} else {
        if ( ini_get('register_globals') != 1 ) {
                                                                                
                $supers = array('HTTP_POST_VARS',
                                'HTTP_GET_VARS',
                                'HTTP_COOKIE_VARS',
                                'GLOBALS',
                                'HTTP_SESSION_VARS',
                                'HTTP_SERVER_VARS',
                                'HTTP_ENV_VARS'
                                 );
                                                                                
                foreach( $supers as $__s) {
                        if ( (isset($$__s) == true) && (is_array( $$__s
) == true) ) extract( $$__s, EXTR_OVERWRITE );
                }
                unset($supers);
        }
}

/*  DE AQUI EN ADELANTE PUEDES EDITAR EL ARCHIVO */

/* aquí se especifica la pagina de respuesta en caso de envío exitoso */
$respuesta_send="send_suscripcion.htm";
$respuesta_error="error_suscripcion.htm";
$nombre="Suscripcion";
// la respuesta puede ser otro archivo, en incluso estar en otro servidor

/* AQUÍ ESPECIFICAS EL CORREO AL CUAL QUEIRES QUE SE ENVÍEN LOS DATOS
DEL FORMULARIO, SI QUIERES ENVIAR LOS DATOS A MÁS DE UN CORREO,
LOS PUEDES SEPARAR POR COMAS */
$para ="info@dupontjeans.com";

/* AQUI ESPECIFICAS EL SUJETO (Asunto) DEL EMAIL */
$sujeto = "Me suscribo para recibir publicidad de su empresa";

/* aquí se construye el encabezado del correo, en futuras
versiones del script explicaré mejor esta parte */ 
$encabezado = "From: $nombre <$email_address>";
$encabezado .= "\nReply-To: $email_address";
$encabezado .= "\nX-Mailer: PHP/" . phpversion() . " \r\n";
$encabezado .= "Mime-Version: 1.0 \r\n";
$encabezado .= "Content-Type: text/html";

/* con esto se captura la IP del que envío el mensaje */
$ip=$REMOTE_ADDR;

/* las siguientes líneas arman el mensaje */
$mensaje .= 
"<div style='font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#333333 border:20px #FFFFFF'><br>Desea recibir nuestras ofertas y promociones.<br><br>

E-mail: $email_address\n<br>

IP: $ip\n</div>";

/* aqui se intenta enviar el correo, si no se
tiene éxito se da un mensaje de error */
if(!mail($para, $sujeto, $mensaje, $encabezado))
{
    /* aqui redireccionamos a la pagina de respuesta2 si ah existido un error */
	echo "<meta HTTP-EQUIV='refresh' content='1;url=$respuesta_error'>";
}
else
{
	/* aqui redireccionamos a la pagina de respuesta */
	echo "<meta HTTP-EQUIV='refresh' content='1;url=$respuesta_send'>";
}

?>