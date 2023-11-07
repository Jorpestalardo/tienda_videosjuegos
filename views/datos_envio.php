<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$mail = $_POST['mail'];
$mensaje = $_POST['mensaje'];
?>
<section class="respuesta-envio container">
    <div class="container">

        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
                <div class="col-md-5 p-lg-5 mx-auto my-5">
                <div class="col-12">
                    <h1 class="text-center">¡Enviado!</h1>
                        <img src="img/envios.png" class="d-block mx-auto img-fluid">
                </div>
                        <h2 class="lead fw-normal"><span>HOLA!</span> <?= ucwords($nombre) ?> <?= ucwords($apellido) ?></h2>
                        <p class="lead fw-normal">Tu mensaje fue enviado, proximamente nos pondremos en contacto con vos a tu cuenta de email <?= $mail?> </p>

                            <a class="btn btn-outline-dark" href="index.php?sec=home">volver a la tienda</a>
                </div>
            <div class="shadow-sm d-none d-md-block"></div>
        <div class="shadow-sm d-none d-md-block"></div>
    </div>
    </div>
</section>


