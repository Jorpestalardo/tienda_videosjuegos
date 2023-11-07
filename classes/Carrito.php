<?php

class Carrito {

    protected $carrito_id;
    protected $nombre;
    protected $precio;
    protected $cantidad;
    protected $nombreComprador;
    protected $mail;
    protected $direccion;
    protected $numeroTarjeta;
    protected $nombreTarjeta;
    protected $codigo;
    protected $pago;
    
        /**
        * Agrega un item al carrito de compras
        *@param int $productoId el ID del juego que se va a agregar
        *@param int $cantidad la cantidad de unidades del producto(juego) que se van a agregar
        */
        public function add_item(int $productoId, int $cantidad){

            $itemData = (new Juego)->consola_x_id($productoId);
            if($itemData){
                $_SESSION['carrito'][$productoId] = [
                    'nombre' => $itemData->getNombreProducto(),
                    'precio'=> $itemData->getPrecio(),
                    'imagen'=> $itemData->getImg(),
                    'alt'=> $itemData->getAlt(),
                    'cantidad' => $cantidad,
                ];
        }
    }

    /**
        * Agrega un item al carrito de compras
        *@param int $consolaId el ID de la consola que se va a agregar
        *@param int $cantidad la cantidad de unidades de consolas que se van a agregar
        */
        public function add_item_consola(int $consolaId, int $cantidad){
            $itemData2 = (new Consola)->get_x_id($consolaId);
            if($itemData2){
                $_SESSION['carrito'][$consolaId] = [
                    'nombre' => $itemData2->getNombre(),
                    'precio'=> $itemData2->getPrecio(),
                    'imagen'=> $itemData2->getImg(),
                    'alt'=> $itemData2->getAlt(),
                    'cantidad' => $cantidad,
                ];
        }
    }

    /**
     * Elimina un juego del carrito de compras
     * @param int $productoId El id del producto a elminar
     */
    public function remove_item(string $productoId)
    {
        if (isset($_SESSION['carrito'][$productoId])) {
            unset($_SESSION['carrito'][$productoId]);
        }
        
    }

    /**
     * Elimina una consola del carrito de compras
     * @param int $consolaId El id del producto a elminar
     */
    public function remove_item_consola(string $consolaId)
    {
        if (isset($_SESSION['carrito'][$consolaId])) {
            unset($_SESSION['carrito'][$consolaId]);
        }
        
    }

        /** Devuelve el contenido del carrito de compras ACTUAL*/
        public function get_carrito() {
            if(!empty($_SESSION['carrito'])){
                return $_SESSION['carrito'];
            }else{
                return [];
            }
        }

        /**Vacia el carrito */
        public function clear_items()
        {
            $_SESSION['carrito'] = [];
        }

        /**Calcula el precio total, asi sea de juegos o consolas */
        public function precio_total(){
            $total = 0;
            if(!empty($_SESSION['carrito'])){
                foreach($_SESSION['carrito'] as $item){
                    $total += $item['precio'] * $item['cantidad'];
                }
            }
            return $total;
        }

        /**
         * Actualiza las cantidades de los ids provistos
         * @param array $cantidades Array asociativo con cantidades de cada ID
        */
        public function actualizar_cantidades(array $cantidades)
        {
            foreach ($cantidades as $key => $value) {
                if (isset($_SESSION['carrito'][$key])) {
                    $_SESSION['carrito'][$key]['cantidad'] = $value;
                }
            }
        }
        
    

        
        public function insert_carrito($nombre, $precio, $cantidad, $nombreComprador, $mail, $direccion, $numeroTarjeta, $nombreTarjeta, $codigo, $pago){
            
            $conexion = Conexion::getConexion();
            $query = "INSERT INTO carrito(`carrito_id`, `nombre`, `precio`, `cantidad`, `nombreComprador`, `mail`, `direccion`, `numeroTarjeta`, `nombreTarjeta`, `codigo`, `pago`) 
            VALUES (NULL, :nombre, :precio, :cantidad, :nombreComprador, :mail, :direccion, :numeroTarjeta, :nombreTarjeta, :codigo, :pago)";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute(
            [
                'nombre' => $nombre,
                'precio' => $precio,
                'cantidad' => $cantidad,
                'nombreComprador' => $nombreComprador,
                'mail' => $mail,
                'direccion' => $direccion,
                'numeroTarjeta' => $numeroTarjeta,
                'nombreTarjeta' => $nombreTarjeta,
                'codigo' => $codigo,
                'pago' => $pago,

            ]   
        );

        }



    /**
     * Get the value of carrito_id
     */ 
    public function getCarrito_id()
    {
        return $this->carrito_id;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Get the value of nombreComprador
     */ 
    public function getNombreComprador()
    {
        return $this->nombreComprador;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Get the value of numeroTarjeta
     */ 
    public function getNumeroTarjeta()
    {
        return $this->numeroTarjeta;
    }

    /**
     * Get the value of nombreTarjeta
     */ 
    public function getNombreTarjeta()
    {
        return $this->nombreTarjeta;
    }

    /**
     * Get the value of codigo
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Get the value of pago
     */ 
    public function getPago()
    {
        return $this->pago;
    }
}