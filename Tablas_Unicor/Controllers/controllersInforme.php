<?php

class Controllerinformes{


    

    public function ReadInforme(){

        include_once('./../Model/reportes.php');
        $informe = new Informes();
        $informe->ReadInforme();
        
    }


}