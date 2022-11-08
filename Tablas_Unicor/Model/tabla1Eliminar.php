<?php  


class Profesor{
    
	function eliminarProfesor() {
	
		if (!isset($_GET['id'])) {
			exit();
		}
		include '../Conexion/conexion.php';

		$codigo = $_GET['id'];

		$sentencia1=$bd->query("SELECT id_profesor,nombre,apellidos,n_identificacion,telefono FROM profesor WHERE id_profesor= '$codigo';");
		$row1=$sentencia1->fetch(PDO::FETCH_ASSOC);

		$nombre = $row1['nombre'];
		$apellidos = $row1['apellidos'];
		$n_ide = $row1['n_identificacion'];
		$telefono= $row1['telefono'];
		
		$sentencia = $bd->prepare("DELETE FROM profesor WHERE id_profesor= ?;");
		$resultado = $sentencia->execute([$codigo]);
	
		if ($resultado === TRUE) {
				
			$datos= array(
				"mensaje"=> "Registro eliminado satisfactoriamente",
				"data" => array("id profesor"=> $codigo,
				"nombres"=> $nombre ,
			    "apellidos"=>  $apellidos,
			    "n_identificacion"=> $n_ide,
			    "telefono"=>  $telefono,)
		   );
		   echo json_encode($datos,true);
		   

			return;		
		}else{

            echo json_encode('{"Error"=> "Problemas a eliminar"}');
		}
}
}



?>