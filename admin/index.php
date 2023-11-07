<?PHP

require_once "../functions/autoload.php";


$secciones_validas = [
    "login" => [
        "titulo" => "Inicio de Sesión",
        "restringido" => FALSE
    ],
    "dashboard" => [
        "titulo" => "Panel de Control",
        "restringido" => TRUE
    ],
    "admin_personajes" => [
        "titulo" => "Administracion de Personajes",
        "restringido" => TRUE
    ],
    "add_personaje" => [
        "titulo" => "Agregar un Personajes",
        "restringido" => TRUE
    ],
    "edit_personaje" => [
        "titulo" => "Edicion de Personajes",
        "restringido" => TRUE
    ],
    "delete_personaje" => [
        "titulo" => "¿Eliminar Personaje?",
        "restringido" => TRUE
    ],
    "admin_consola" => [
        "titulo" => "Administracion de Consolas",
        "restringido" => TRUE
    ],
    "add_consola" => [
        "titulo" => "Agregar una Consola",
        "restringido" => TRUE
    ],
    "edit_consola" => [
        "titulo" => "Edicion de Consolas",
        "restringido" => TRUE
    ],
    "delete_consola" => [
        "titulo" => "¿Eliminar Consola?",
        "restringido" => TRUE
    ],
    "admin_creador" => [
        "titulo" => "Administracion de Creadores",
        "restringido" => TRUE
    ],
    "add_creador" => [
        "titulo" => "Agregar Creador/es",
        "restringido" => TRUE
    ],
    "edit_creador" => [
        "titulo" => "Edicion de Creador/creadores",
        "restringido" => TRUE
    ],
    "delete_creador" => [
        "titulo" => "¿Eliminar Creador?",
        "restringido" => TRUE
    ],
    "admin_juego" => [
        "titulo" => "Administrar Juegos",
        "restringido" => TRUE
    ],
    "add_juego" => [
        "titulo" => "Agregar un Juego",
        "restringido" => TRUE
    ],
    "edit_juego" => [
        "titulo" => "Editar un Juego",
        "restringido" => TRUE
    ],
    "delete_juego" => [
        "titulo" => "¿Eliminar Juego?",
        "restringido" => TRUE
    ],

];

$seccion = $_GET['sec'] ?? "dashboard";

if(!array_key_exists($seccion, $secciones_validas)){
    $vista = "404";
    $titulo = "404 - Página no encontrada";
}else{
    $vista = $seccion;

    
    if($secciones_validas[$seccion]['restringido']){
        (new Autenticacion())->verify();        
    }

    $titulo = $secciones_validas[$seccion]['titulo'];
}

//Chequea si el usuario está logueado, (de ser asi guarda los datos en una variable), sino... utilizamos el null y guarda como false. 
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
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@100;400;700&family=Press+Start+2P&family=VT323&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">   
<title>Juegos Retro - <?= $titulo; ?> </title>
</head>
<body>
    <nav class="navDash navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">  <img src="../img/logoNav.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link" href="index.php?sec=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link" href="index.php?sec=admin_personajes">Admin. Personajes</a>
                    </li>
                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link" href="index.php?sec=admin_consola">Admin. Consolas</a>
                    </li>
                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link" href="index.php?sec=admin_creador">Admin. Creadores</a>
                    </li>
                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link" href="index.php?sec=admin_juego">Admin. Juegos</a>
                    </li>
                    <li class="nav-item <?= $userData ? "d-none" : "" ?>">
                        <a class="nav-link fw-bold" href="index.php?sec=login">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link fw-bold" href="actions/auth_logout.php">Cerrar Sesión</a>
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