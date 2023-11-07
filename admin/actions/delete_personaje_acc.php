<?PHP 

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$personaje = (new Personajes())->get_x_id($id);

echo "<pre>";
print_r($personaje);
echo "</pre>";

try {
    if(!empty($personaje->getImg())){
        (new Imagen())->borrarImagen(__DIR__ . "/../../img/personajes/" . $personaje->getImg());
    }
    $personaje->delete();

    (new Alerta())->add_alerta('danger', "El personaje <strong> {$personaje->getPersonaje()} </strong> se eliminó correctamente :)");
    header('Location: ../index.php?sec=admin_personajes');
} catch (\Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No se pudo eliminar el personaje :(");
}