<?php 
	//print_r($_POST);

	require_once 'validaciones.php';
	class Curso{
    
		function updateCurso() {
		
			if (!isset($_POST['oculto'])) {
				header('Location: cursos.php');
			}
		
			include '../Conexion/conexion.php';
			$id3 = $_POST['id3'];
			$Nombrecurso = $_POST['txtNombrecurso3'];
			$Cantidad_estu3= $_POST['txtCantidad3'];
			$Correo3 = $_POST['txtCorreo3'];
			$FechaH3= date('Y-m-d H:i:s', strtotime( $_POST['txtFechaH3']));
			$Fecha3= date('Y-m-d', strtotime( $_POST['txtFecha3']));
			$Valor_c3= $_POST['txtValor3'];
			$Profesor3= $_POST['txtProfesor3'];

			$curso= new Validaciones();

			if ($curso->nombrecursoExiste($Nombrecurso)) {
				$error= array(
					"error"=> "Nombre del curso ya existe"
			   );
			   $var1= json_encode($error,true);
			   echo "$var1";
			}
			else{
				$sentencia1=$bd->query("SELECT nombre,apellidos,n_identificacion,telefono FROM profesor WHERE id_profesor= '$Profesor3';");
		    $row1=$sentencia1->fetch(PDO::FETCH_ASSOC);

			$nombre = $row1['nombre'];
			$apellidos = $row1['apellidos'];
			$n_ide = $row1['n_identificacion'];
			$telefono= $row1['telefono'];
		
		
			$sentencia3 = $bd->prepare("UPDATE cursos SET nombre_curso = ?, cantidad_estu = ?, correo_curso = ?, 
														valor_curso = ?, fecha_hora = ?, fecha = ?, id_profesor = ?   WHERE id_curso = ?;");
			$resultado2 = $sentencia3->execute([$Nombrecurso,$Cantidad_estu3,$Correo3,$Valor_c3,$FechaH3,$Fecha3,$Profesor3, $id3]);
		
		
			if ($resultado2 === TRUE) {
				$datos= array(
					"mensaje"=> "Registro actualizado satisfactoriamente",
					"data" => array("Id curso"=> $id3,
					"Nombre Curso"=> $Nombrecurso,
					"fk_id"=> $Profesor3,
					"Cantidad estudiante"=> $Cantidad_estu3,
					"Correo"=>$Correo3,
					"Fecha y hora"=>$FechaH3,
					"Fecha"=>$Fecha3,
					"Valor curso"=>$Valor_c3,
					"Profesor"=> array("id profesor"=> $Profesor3,"Nombre profesor"=> $nombre,"Apellidos profesor"=> $apellidos,"Numero documento"=> $n_ide,"Telefono"=> $telefono))
			   );
			   $var= json_encode($datos,true);
			   echo "$var";
		    
	        }else{
				echo json_encode('{"Error"=> "Problemas al actualizar"}');
	      }
		

			}

			

    }	
}
?>