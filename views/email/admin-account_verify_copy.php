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
        Se registro un nuevo usuario al sistema estos son sus datos:
    </p>

    <p style="font-family: 'Arial'; font-size:20px;">
        <span style="color:#e83b3b;">Email: </span> <?php echo @$admin['email'] ?>
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
