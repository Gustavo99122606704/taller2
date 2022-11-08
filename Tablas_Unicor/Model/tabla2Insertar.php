<?php  
	require_once 'validaciones.php';

	class Curso{
    
		function registroCurso() {
		
			include '../Conexion/conexion.php';
	        $Nombrecurso = $_POST['txtNombrecurso'];
	        $Cantidad_estu= $_POST['txtCantidad'];
            $Correo = $_POST['txtCorreo'];
            $FechaH= date('Y-m-d H:i:s', strtotime( $_POST['txtFechaH']));
            $Fecha= date('Y-m-d', strtotime( $_POST['txtFecha']));
            $Valor_c= $_POST['txtValor'];
            $Profesor= $_POST['txtProfesor'];


			$curso= new Validaciones();

			if ($curso->nombrecursoExiste($Nombrecurso)) {
				$error= array(
					"error"=> "Nombre del curso ya existe"
			   );
			   $var1= json_encode($error,true);
			   echo "$var1";
			}
			else{

				

	        $sentencia = $bd->prepare("INSERT INTO cursos(nombre_curso,cantidad_estu,correo_curso,valor_curso,fecha_hora,fecha,id_profesor) VALUES (?,?,?,?,?,?,?);");
	        $resultado = $sentencia->execute([$Nombrecurso,$Cantidad_estu,$Correo,$Valor_c,$FechaH,$Fecha,$Profesor]);

			$sentencia2=$bd->query("SELECT cur.id_curso,prof.nombre,prof.apellidos,prof.n_identificacion,prof.telefono FROM cursos cur  INNER JOIN profesor prof ON cur.id_profesor = prof.id_profesor WHERE nombre_curso= '$Nombrecurso';");
		    $row2=$sentencia2->fetch(PDO::FETCH_ASSOC);

			$id_Curso = $row2['id_curso'];

			$nombre = $row2['nombre'];
			$apellidos = $row2['apellidos'];
			$n_ide = $row2['n_identificacion'];
			$telefono= $row2['telefono'];
		

	        if ($resultado === TRUE) {
				$datos= array(
					"mensaje"=> "Registro insertado satisfactoriamente",
					"data" => array("Id curso"=> $id_Curso,
					"Nombre Curso"=> $Nombrecurso,
					"fk_id"=> $Profesor,
					"Cantidad estudiante"=> $Cantidad_estu,
					"Correo"=>$Correo,
					"Fecha y hora"=>$FechaH,
					"Fecha"=>$Fecha,
					"Valor curso"=>$Valor_c,
					"Profesor"=> array("id profesor"=> $Profesor,"Nombre profesor"=> $nombre,"Apellidos profesor"=> $apellidos,"Numero documento"=> $n_ide,"Telefono"=> $telefono))
			   );
			   $var= json_encode($datos,true);
			   echo "$var";
		    
	        }else{
				echo json_encode('{"Error"=> "Problemas a insertar"}');
	      }

			}

			

    }	
}
?>