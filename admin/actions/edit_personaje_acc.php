<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['imagen'] ?? FALSE;
$id = $_GET['id'] ?? FALSE;


//echo "<pre>";
//print_r($postData);
//echo "</pre>";

//echo "<pre>";
//print_r($fileData);
//echo "</pre>";

//echo "<pre>";
//print_r($id);
//echo "</pre>";

try {

    $personaje = new Personajes();

    if(!empty($fileData['tmp_name'])) {

        if(!empty($postData['imagen_og'])){ 
            (new Imagen())->borrarImagen(__DIR__ . "/../../img/personajes/" . $postData['imagen_og']);
        }
        $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/personajes", $fileData, $postData['nombre']);
        $personaje->reemplazar_imagen($imagen, $id);
        //los parametros que se le pasan a la funcion es la variable imagen que es el nuevo modelo de la clase imagen con su funcion subirimagen
        //y el ID es el ID POR PARAMETRO QUERY (NO OLVIDAR)
    }

    $personaje->edit($postData['nombre'],
    $postData['descripcion'],
    $postData['alt'],
    $id);

    (new Alerta())->add_alerta('info', "Los datos de <strong> {$postData['nombre']} </strong> se editaron correctamente :)");
    header('Location: ../index.php?sec=admin_personajes');


} catch (\Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No se pudo editar el personaje :(");
}

