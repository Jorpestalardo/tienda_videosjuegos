<?PHP 

class Alerta {
    /** 
    *registro una alerta en el sist. guardandola en la sesion
    *@param string $tipo     danger/warning/success
    *@param string $mensaje  contenido de la alerta

    */

    public function add_alerta(string $tipo, string $mensaje){
        $_SESSION['alertas'][] = [
            'tipo' => $tipo,
            'mensaje' => $mensaje
        ];
    }

    //vacia la lista de alertas

    public function clear_alertas(){
        $_SESSION['alertas'] = [];
    }

    /** 
     *devuelve todas las alertas acum. en el sist. y vacia la lista
     *@return string
     */ 

    public function get_alertas(){
        if(!empty($_SESSION['alertas'])){
            $alertasActuales = ""; 
            foreach($_SESSION['alertas'] as $alerta){
                $alertasActuales .= $this->print_alerta($alerta);
            }
            $this->clear_alertas();
            return $alertasActuales;
        }else{
            return null;
        }
    }

    private function print_alerta($alerta) :string{
        $html = "<div class='alert alert-{$alerta['tipo']}' role='alert'>";
        $html .= $alerta['mensaje'];
        $html .= "</div>";
        
        return $html;
    }
}

