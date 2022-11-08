<?php



class ControllerCursos{


    public function RegistrarCurso(){

        include_once('./../Model/tabla2Insertar.php');
        $login = new Curso();
        $login->registroCurso();
    }

    public function UpdateCurso(){

        include_once('./../Model/tabla2Editar.php');
        $login = new Curso();
        $login->updateCurso();
    }


    public function EliminarCurso(){

        include_once('./../Model/tabla2Eliminar.php');
        $login = new Curso();
        $login->eliminarCurso();
    }

    public function ReadCurso(){

        include_once('./../Views/tabla2Read.php');
        
    }


}