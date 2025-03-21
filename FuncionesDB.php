<?php
include 'conexionDb.php';

?>
<?php
class Persona{
    protected $nombre; 
    protected $email;
    protected $edad;

    function __construct($nombre, $email, $edad){
        $this->nombre = $nombre;
        $this->email = $email;
        $this->edad = $edad;
    }

    function mayorEdad(){
        return $this->edad >= 18 ? 'si' : 'no';
    }


    function setEdad($edad){
        $this->edad = $edad;
    }
    function getEdad(){
        return $this->edad;
    }

    function AgregarUsuario(){

    }
}
