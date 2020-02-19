<html>
<head><title>:: <?php echo @$title ?> ::</title></head>

<body>

<div style="margin-top:0;">
    <div
        style="padding-left:20px; background-color:#ffffff; max-width:400px;">
        <img style="border:none;max-width:100%;width:100%;height:auto;" width="100" src="<?php echo BASE_URL ?>assets/admin/img/email/logo.png" alt="logo" align="center">
    </div>
</div>

<div style="max-width:800px;margin-left:20px;">

    <p style="font-family: 'Arial'; font-size:20px;">
        Bienvenido, <span style="color:#e83b3b;"><?php echo @$admin['email'] ?></span>
    </p>

    <p style="font-family: 'Arial'; font-size:20px;">
        Olvidaste tu contrase&ntilde;a?, aqui te renovamos para que puedas acceder a la aplicaci&oacute;n: <span style="color:#e83b3b;"><?php echo @$admin['password'] ?></span>
    </p>

    <p style="font-family: 'Arial'; font-size:20px;">Y disfruta de los beneficios de nuestra aplicación.</p>

    <p style="font-family: 'Arial'; font-size:20px;">Atte.</p>

    <div style="width:200px;">
        <img style="border:none;max-width:100%;width:100%;height:auto;" src="<?php echo BASE_URL ?>assets/admin/img/email/footer_img.png" alt="">
    </div>
</div>


</div>
</body>
</html>

