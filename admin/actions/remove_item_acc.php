<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$idC = $_GET['idC'] ?? FALSE;


if($id){
    (new Carrito())->remove_item($id);
    header('location: ../../index.php?sec=carrito');
}

if($idC){
    (new Carrito())->remove_item_consola($idC);
    header('location: ../../index.php?sec=carrito');
}