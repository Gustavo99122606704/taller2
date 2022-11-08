<?php

class ControllerProfesors{


    public function RegistrarProfesor(){
        include_once('./../Model/tabla1Insertar.php');
        $login = new Profesor();
        $login->registroProfesor();
       
    }

    public function UpdateProfesor(){

        include_once('./../Model/tabla1Editar.php');
        $login = new Profesor();
        $login->updateProfesor();
    }


    public function EliminarProfesor(){

        include_once('./../Model/tabla1Eliminar.php');
        $login = new Profesor();
        $login->eliminarProfesor();
    }

    public function ReadProfesor(){

        include_once('./../Views/tabla1Read.php');
        
    }


}