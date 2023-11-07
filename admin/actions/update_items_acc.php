<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;


if(!empty($postData)){
    (new Carrito())->actualizar_cantidades($postData['c']);
    header('location: ../../index.php?sec=carrito');
}