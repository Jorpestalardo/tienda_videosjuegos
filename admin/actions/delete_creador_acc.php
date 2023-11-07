<?PHP 

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$creador = (new Creadores())->get_x_id($id);

echo "<pre>";
print_r($creador);
echo "</pre>";

try {
    if(!empty($creador->getImg())){
        (new Imagen())->borrarImagen(__DIR__ . "/../../img/creadores/" . $creador->getImg());
    }
    $creador->delete();

    (new Alerta())->add_alerta('danger', "El creador <strong> {$creador->getNombre_completo()} </strong> se eliminó correctamente :)");
    header('Location: ../index.php?sec=admin_creador');
} catch (\Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No se pudo eliminar el creador :(");
}