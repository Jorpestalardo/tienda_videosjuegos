<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$items = $_SESSION['carrito'];

//echo "<pre>";
//print_r($postData);
//echo "</pre>";

try {
    
    if(count($items)){
        foreach ($items as $I){

        (new Carrito())->insert_carrito(
        $I['nombre'],
        $I['precio'],
        $I['cantidad'],
        $postData['nombreComprador'],
        $postData['mail'],
        $postData['direccion'],
        $postData['numeroTarjeta'],
        $postData['nombreTarjeta'], 
        $postData['codigo'],
        $postData['pago']
        );

        }
    }
    
    (new Carrito())->clear_items();

    (new Alerta())->add_alerta('success', "Su compra <strong> {$postData['nombreComprador']} </strong> se cargó correctamente :) le enviaremos un correo a: {$postData['mail']} para coordinar la entrega de su paquete en la dirección {$postData['direccion']}");

    header('Location: ../../index.php?sec=gracias_por_su_compra');


} catch (\Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No se pudo cargar la compra :(");
}
