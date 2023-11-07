<?PHP 
require_once "../../functions/autoload.php";

(new Autenticacion())->log_out();
header('Location: ../../index.php?sec=login');