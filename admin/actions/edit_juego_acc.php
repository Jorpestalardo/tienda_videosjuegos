<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['imagen'] ?? FALSE;
$id = $_GET['id'] ?? FALSE;


echo "<pre>";
print_r($postData);
echo "</pre>";

echo "<pre>";
print_r($fileData);
echo "</pre>";

echo "<pre>";
print_r($id);
echo "</pre>";

try {

    $juegos = new Juego();

    $juegos->clear_personajes_sec($id);

if (isset($postData['personajes_secundarios'])) {
    foreach ($postData['personajes_secundarios'] as $personaje_id) {
        $juegos->add_personajes_sec($id, $personaje_id);
    }
}
    if(!empty($fileData['tmp_name'])) {

        if(!empty($postData['imagen_og'])){ 
            (new Imagen())->borrarImagen(__DIR__ . "/../../img/juegos/" . $postData['imagen_og']);
        }
        $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/juegos", $fileData, $postData['nombre']);
        $juegos->reemplazar_imagen($imagen, $id);
        //los parametros que se le pasan a la funcion es la variable imagen que es el nuevo modelo de la clase imagen con su funcion subirimagen
        //y el ID es el ID POR PARAMETRO QUERY (NO OLVIDAR)
    }

    $juegos->edit(
        $postData['creadores_id'],
        $postData['personaje_id'],
        $postData['consola_id'],
        $postData['nombre'],
        $postData['anio'],
        $postData['descripcion'],
        $postData['precio'],
        $postData['alt'],
        $postData['player'],
        $id);    

        (new Alerta())->add_alerta('info', "Los datos de <strong> {$postData['nombre']} </strong> se editaron correctamente :)");
    header('Location: ../index.php?sec=admin_juego');


} catch (\Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No se pudo editar el juego :(");
}

