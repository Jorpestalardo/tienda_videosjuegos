<?php

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$c = $_GET['c'] ?? 1;
$idC = $_GET['idC'] ?? FALSE;



if($id){
    (new Carrito())->add_item($id, $c);
    header('location: ../../index.php?sec=carrito');
}

if($idC){
    (new Carrito())->add_item_consola($idC, $c);
    header('location: ../../index.php?sec=carrito');
}
