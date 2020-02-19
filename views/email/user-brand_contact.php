<html>
<head>
    <title>Confirmaci&oacute;n de envio del formulario de Contactos</title>
</head>
<body link="#666666" vlink="#999999" alink="#CCCCCC" bgcolor="#F0F0F0">
<table width="495" border="0" cellpadding="10" cellspacing="2">
    <tr>
        <td height="20" align="center" valign="top" bgcolor="#D6811B"><font color="#FFFFFF" size="-1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Formulario de Contactos :: PREMIER FRANQUICIAS ::</strong></font></td>
    </tr>
    <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF">
            <p><font color="#666666" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><?php echo $user['first_name'] ?></strong>, gracias por sus comentarios.</font></p>
            <p><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Su correo ha sido recibido y ser&aacute; respondido con la mayor brevedad posible. Este correo confirma su env&iacute;o efectuado desde nuestro Formulario de Contactos.</font></p>
            <p><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Si recibe este correo por accidente, por favor, comun&iacute;quelo a nuestro servicio de <a href="mailto:<?php echo MAIL_ADMIN_ADDRESS ?>">Atención al Cliente</a></font></p>
            <font color="#999999" size="1" face="Verdana, Arial, Helvetica, sans-serif">Este formulario a sido enviado el <?php echo $date ?>.<br>
                Desde la IP: <?php echo $ip ?> <br>
                N&uacute;mero de serie: <?php echo $boundary ?></font></td>
    </tr>
    <tr>
        <td bgcolor="#FFFFFF"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="www.motion.com.bo" target="_blank">Powered By Motion TM Ltda.</a></font></td></tr>
</table>
</body>
</html>