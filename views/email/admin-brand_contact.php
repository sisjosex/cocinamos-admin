<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <title>Formulario de Contactos</title>
</head>
<body link="#666666" vlink="#666666" alink="#666666" bgcolor="#F0F0F0">
<table width="550" height="300" border="0" cellpadding="10" cellspacing="0">
    <tr>
        <td width="550" height="20" align="center" valign="middle" bgcolor="#D6811B">
            <font color="#FFFFFF" size="-1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Formulario de Contactos - ::  PREMIER FRANQUICIAS  ::</strong></font></td>
    </tr>
    <tr>
        <th width="550" height="280" bgcolor="#FFECD2"><table width="550" height="280" border="0" cellpadding="10" cellspacing="3">
                <tr>
                    <td width="80" height="20" align="right" valign="middle" bgcolor="#EAEAEA">
                        <font size="-2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombre:</strong></font></td>
                    <td width="470" height="20" align="left" valign="middle" bgcolor="#FFFFFF">
                        <font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="-2"><?php echo $user['first_name'] . ' ' . $user['last_name'] ?></font></td>
                </tr>
                <tr>
                    <td width="80" height="20" align="right" valign="middle" bgcolor="#EAEAEA">
                        <font face="Verdana, Arial, Helvetica, sans-serif" size="-2" color="#000000"><strong>Correo:</strong></font></td>
                    <td width="470" height="20" align="left" valign="middle" bgcolor="#FFFFFF">
                        <font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="-2"><a href="mailto:<?php echo $user['email'] ?>"><?php echo $user['email'] ?></a></font></td>
                </tr>
                <tr>
                    <td width="80" height="20" align="right" valign="middle" bgcolor="#EAEAEA">
                        <font face="Verdana, Arial, Helvetica, sans-serif" size="-2" color="#000000"><strong>Ciudad:</strong></font></td>
                    <td width="470" height="20" align="left" valign="middle" bgcolor="#FFFFFF">
                        <font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="-2"><?php echo $city['name'] ?></font></td>
                </tr>
                <tr>
                    <td width="80" height="20" align="right" valign="middle" bgcolor="#EAEAEA">
                        <font size="-2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Teléfono:</strong></font></td>
                    <td width="470" height="20" align="left" valign="middle" bgcolor="#FFFFFF">
                        <font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="-2"><?php echo $user['phone'] ?></font></td>
                </tr>
                <tr>
                    <td width="80" height="20" align="right" valign="middle" bgcolor="#EAEAEA">
                        <font size="-2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Consulta:</strong></font></td>
                    <td width="470" height="20" align="left" valign="middle" bgcolor="#FFFFFF">
                        <font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="-2"><?php echo $user['type'] ?></font></td>
                </tr>
                <tr>
                    <td width="80" height="80" align="right" valign="top" bgcolor="#EAEAEA">
                        <font size="-2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Comentario:</strong></font></td>
                    <td width="470" height="80" align="left" valign="top" bgcolor="#FFFFFF">
                        <font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="-2"><?php echo htmlentities($user['content']) ?></font></td>
                </tr>
                <tr>
                    <td width="80" height="20" align="right" valign="middle" bgcolor="#EAEAEA">
                        <font size="-2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha:</strong></font></td>
                    <td width="470" height="20" align="left" valign="middle" bgcolor="#FFFFFF">
                        <font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="-2"><?php echo $date ?></font></td>
                </tr>
                <tr>
                    <td width="80" height="20" align="right" valign="middle" bgcolor="#EAEAEA">
                        <font size="-2" face="Verdana, Arial, Helvetica, sans-serif"><strong>IP:</strong></font></td>
                    <td width="470" height="20" align="left" valign="middle" bgcolor="#FFFFFF">
                        <font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="-2"><?php echo $ip ?></font></td>
                </tr>
                <tr>
                    <td width="80" height="20" align="right" valign="middle" bgcolor="#EAEAEA">
                        <font size="-2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Serie:</strong></font></td>
                    <td width="470" height="20" align="left" valign="middle" bgcolor="#FFFFFF">
                        <font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="-2"><?php echo $boundary ?></font></td>
                </tr>
            </table></th>
    </tr>
</table>
</body>
</html>