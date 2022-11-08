<?php  
	
	class Curso{
    
		function eliminarCurso() {
		
			if (!isset($_GET['id'])) {
				exit();
			}
			include '../Conexion/conexion.php';
			$codigo = $_GET['id'];

			$sentencia2=$bd->query("SELECT cur.nombre_curso, cur.cantidad_estu,cur.fecha_hora,cur.correo_curso,cur.valor_curso,cur.fecha,cur.id_profesor,prof.nombre,prof.apellidos,prof.n_identificacion,prof.telefono FROM cursos cur  INNER JOIN profesor prof ON cur.id_profesor = prof.id_profesor WHERE id_curso= '$codigo';");
		    $row2=$sentencia2->fetch(PDO::FETCH_ASSOC);

			
			$Nombrecurso = $row2['nombre_curso'];
	        $Cantidad_estu= $row2['cantidad_estu'];
            $Correo = $row2['correo_curso'];
            $FechaH= $row2['fecha_hora'];
            $Fecha= $row2['fecha'];
            $Valor_c= $row2['valor_curso'];
            $Profesor= $row2['id_profesor'];


			$nombre = $row2['nombre'];
			$apellidos = $row2['apellidos'];
			$n_ide = $row2['n_identificacion'];
			$telefono= $row2['telefono'];
			
			$sentencia = $bd->prepare("DELETE FROM cursos WHERE id_curso= ?;");
			$resultado = $sentencia->execute([$codigo]);
		
			if ($resultado === TRUE) {
				$datos= array(
					"mensaje"=> "Registro eliminado satisfactoriamente",
					"data" => array("Id curso"=> $codigo,
					"Nombre Curso"=> $Nombrecurso,
					"fk_id"=> $Profesor,
					"Cantidad estudiante"=>$Cantidad_estu,
					"Correo"=>$Correo,
					"Fecha y hora"=>$FechaH,
					"Fecha"=>$Fecha,
					"Valor curso"=>$Valor_c,
					"Profesor"=> array("id profesor"=> $Profesor,"Nombre profesor"=> $nombre,"Apellidos profesor"=> $apellidos,"Numero documento"=> $n_ide,"Telefono"=> $telefono))
			   );
			   $var= json_encode($datos,true);
			   echo "$var";
		    
	        }else{
				echo json_encode('{"Error"=> "Problemas al eliminar"}');
	      }
		

    }	
}

?>