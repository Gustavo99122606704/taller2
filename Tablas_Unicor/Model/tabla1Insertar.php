<?php  

require_once 'validaciones.php';

	class Profesor{
    
		function registroProfesor() {
		
			include '../Conexion/conexion.php';

			$prof= new Validaciones();

            $apellidos = $_POST['txtApellidos'];
	        $n_identificacion= $_POST['txtIdentificacion'];
            $nombre = $_POST['txtNombre'];
	        $telefono= $_POST['txtTelefono'];

			if ($prof->ndocumentoExiste($n_identificacion)) {
				$error= array(
					"error"=> "Numero de documento ya existe"
			   );
			   $var1= json_encode($error,true);
			   echo "$var1";
			}
			
			else {
				$sentencia = $bd->prepare("INSERT INTO profesor(apellidos,nombre,n_identificacion,telefono) VALUES (?,?,?,?);");
				$resultado = $sentencia->execute([$apellidos,$nombre,$n_identificacion,$telefono]);
	
	
				$sentencia1=$bd->query("SELECT id_profesor FROM profesor WHERE n_identificacion= '$n_identificacion';");
				$row1=$sentencia1->fetch(PDO::FETCH_ASSOC);
	
				$id_profesor = $row1['id_profesor'];
				
				if ($resultado === TRUE) {
			
				  $datos= array(
					"mensaje"=> "Registro insertado satisfactoriamente",
					"data" => array( "id"=> $id_profesor,
					"nombres"=> $nombre,
					"apellidos"=> $apellidos,
					"n_identificacion"=>$n_identificacion,
					"telefono"=> $telefono,)
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