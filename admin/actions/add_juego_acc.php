<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['imagen'];


//echo "<pre>";
  //  print_r($postData);
    //echo "</pre>";

try {
    
    $juegos = new Juego();


    //empty retorna true en caso que tengamos false, null, 0, "" ó []
    
    $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/juegos", $fileData, $postData['nombre']);
    $idJuego = $juegos->insert(
        $postData['creadores_id'],
        $postData['personaje_id'],
        $postData['consola_id'],
        $postData['nombre'],
        $postData['anio'],
        $postData['descripcion'], 
        $postData['precio'],
        $imagen,
        $postData['alt'],
        $postData['player']
    );

    if (isset($postData['personajes_secundarios'])) {
    foreach ($postData['personajes_secundarios'] as $personaje_id) {
        $juegos->add_personajes_sec($idJuego, $personaje_id);
        }
    }


    (new Alerta())->add_alerta('success', "El juego <strong> {$postData['nombre']} </strong> se cargó correctamente :)");

    header('Location: ../index.php?sec=admin_juego');


} catch (\Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No se pudo cargar el juego :(");
}
