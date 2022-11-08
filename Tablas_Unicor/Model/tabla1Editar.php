<?php 
	//print_r($_POST);
	
	require_once 'validaciones.php';

	class Profesor{
    
		function updateProfesor() {
		
			if (!isset($_POST['oculto'])) {
				header('Location: ../index.php');
			}
		
			include '../Conexion/conexion.php';

			$prof= new Validaciones();

			$id2 = $_POST['id2'];
			$apellidos2 = $_POST['txtApellidos2'];
			$n_identificacion= $_POST['txtIdentificacion2'];
			$nombre2= $_POST['txtNombre2'];
			$telefono2= $_POST['txtTelefono2'];

			
			if ($prof->ndocumentoExiste($n_identificacion)) {
				$error= array(
					"error"=> "Numero de documento ya existe"
			   );
			   $var1= json_encode($error,true);
			   echo "$var1";
			}
			else{
				$sentencia = $bd->prepare("UPDATE profesor SET apellidos = ?, n_identificacion = ?, nombre = ?, 
														telefono = ?  WHERE id_profesor = ?;");
			    $resultado = $sentencia->execute([$apellidos2,$n_identificacion,$nombre2,$telefono2, $id2]);
		
			   if ($resultado === TRUE) {
				
				$datos= array(
					"mensaje"=> "Registro Actualizado satisfactoriamente",
					"data" => array("id profesor"=> $id2,
					"nombres"=> $nombre2,
					"apellidos"=> $apellidos2,
					"n_identificacion"=>$n_identificacion,
					"telefono"=> $telefono2,)
			   );
			   $var= json_encode($datos,true);
			   echo "$var";
	
				}else{
					echo json_encode('{"Error"=> "Problemas a actualizar"}');
				}

			}
		
			

	}
	
}
?>