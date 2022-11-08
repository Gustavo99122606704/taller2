

		

<?php  


class Informes{
    
    function ReadInforme() {
		
        include '../Conexion/conexion.php';
        
        $FechaHnicio= date('Y-m-d', strtotime( $_POST['txtFechainicio']));
        $Fecha= date('Y-m-d', strtotime( $_POST['txtFechafinalizacion']));
        ?>
       <!DOCTYPE html>
       <html lang="en">
       <head>
	    <title>Lista informe</title>
	    <meta charset="utf-8">
	    <link rel="stylesheet" href="../css/style.css">
        </head>
       <body>
       <div class="formulario">
        
       <h3>Lista de informe</h3>
       <table>
       <tr>
            <td>Código</td>
            <td>Nombre curso</td>
            <td>Cantidad estudiante</td>
            <td>Correo curso</td>
            <td>Fecha Inicio</td>
            <td>Fecha Finalizacion</td>
            <td>Valor curso</td>
            <td>Nombre profesor</td>
            <td>Apellidos profesor</td>
            <td>Numero identificacion</td>
            <td>Telefono</td>
            </tr>

        <?php  

            $sentencia2=$bd->query("SELECT cur.id_curso,cur.nombre_curso, cur.cantidad_estu,cur.fecha_hora,cur.correo_curso,cur.valor_curso,cur.fecha,prof.nombre,prof.apellidos,prof.n_identificacion,prof.telefono FROM cursos cur  INNER JOIN profesor prof ON cur.id_profesor = prof.id_profesor WHERE fecha  BETWEEN '$FechaHnicio' AND '$Fecha';");
           
         
            while ($row2=$sentencia2->fetch(PDO::FETCH_ASSOC)) {     
                echo'
                    <tr>
                            <td>'.$row2['id_curso'].'</td>
                            <td>'.$row2['nombre_curso'].'</td>
                            <td>'.$row2['cantidad_estu'].'</td>
                            <td>'.$row2['correo_curso'].'</td>
                            <td>'.$row2['fecha_hora'].'</td>
                            <td>'.$row2['fecha'].'</td>
                            <td>'.$row2['valor_curso'].'</td>
                            <td>'.$row2['nombre'].'</td>
                            <td>'.$row2['apellidos'].'</td>
                            <td>'.$row2['n_identificacion'].'</td>
                            <td>'.$row2['telefono'].'</td>
                        </tr>
                        ';
            

            }

           
	}

}

?>
			
</table>
</div>
</body>
</html>
