<?PHP
require_once "functions/autoload.php";


$consolasId = (new Consola())->catalogo_completo();


$secciones_validas = [
    "home" => [
        "titulo" => "Bienvenidos"
    ], 
    "catalogo_completo" => [
        "titulo" => "Catálogo completo"
    ],
    "envios" => [
        "titulo" => "Información de envíos"
    ], 
    "quienes_somos" => [
        "titulo" => "¿Quienes Somos?"
    ],
    "juegos"=> [
        "titulo" => "Catálogo de Juegos"
    ],
    "detalle-juegos"=> [
        "titulo" => "Detalle del Juego"
    ],
    "detalle-consolas"=> [
        "titulo" => "Detalle de la Consola"
    ],
    "detalle-creadores"=> [
        "titulo" => "Creadores"
    ],
    "player"=> [
        "titulo" => "Players"
    ],
    "datos_alumnas"=> [
        "titulo" => "Información alumnas"
    ],
    "datos_envio"=> [
        "titulo" => "Envio Exitoso"
    ],
    "sandbox" => [
        "titulo" => "Sandbox para testeo"
    ],
    "login" => [
        "titulo" => "Login inicio de sesión"
    ],
    "carrito" => [
        "titulo" => "Carrito de compras"
    ],
    "finalizar_compra" => [
        "titulo" => "Finalizar Compra"
    ],
    "gracias_por_su_compra" => [
        "titulo" => "Muchas Gracias"
    ]

];

$seccion = $_GET['sec'] ?? "home";

if(!array_key_exists($seccion, $secciones_validas)){
    $vista = "404";
    $titulo = "404 - Página no encontrada";
}else{
    $vista = $seccion;
    $titulo = $secciones_validas[$seccion]['titulo'];
}

$userData = $_SESSION['loggedIn'] ?? FALSE;
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@100;400;700&family=Press+Start+2P&family=VT323&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">   
<title>Juegos Retro - <?= $titulo; ?> </title>
</head>
<body>
    <nav class="navUsuario navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">  <img src="img/logoNav.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=quienes_somos">¿Quiénes somos?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=catalogo_completo">Catálogo Completo</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Juegos por consolas
                        </a>
                        <ul class="dropdown-menu">

                        <?PHP foreach ($consolasId as $jId){ ?>
                            <a class="nav-link" href="index.php?sec=juegos&con=<?= $jId->getConsola_id() ?>"><?= $jId->getNombre() ?></a>
                        <?PHP } ?>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=envios">Envios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=datos_alumnas">Datos de Alumnas</a>
                    </li>
                    <li class="nav-item <?= $userData ? "d-none" : "" ?>">
                        <a class="nav-link fw-bold" href="index.php?sec=login">Login</a>
                    </li>
                    <li class="nav-item <?= $userData ? "" : "d-none" ?> fw-bold">
                        <a class="nav-link fw-bold" href="index.php?sec=carrito">Carrito</a>
                    </li>
                    <li class="nav-item <?= $userData ? "" : "d-none" ?> fw-bold">
                        <a class="nav-link fw-bold" href="admin/actions/auth_logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




    <main>
        <?php

        require file_exists("views/$seccion.php") ? "views/$seccion.php" : "views/404.php";
        ?>
    </main>

    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3">
            <span class="h5">Alumnas:</span>
            <p> Pestalardo María Jorgelina</p>
            <p> Rossi Verona</p>
        </div>

    </footer>
    
</body>
</html>