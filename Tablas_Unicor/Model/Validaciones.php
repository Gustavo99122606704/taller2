<?php


class Validaciones {


    function ndocumentoExiste($n_identificacion)
	{
		include '../Conexion/conexion.php';
		$stmt = $bd->prepare("SELECT id_profesor FROM profesor WHERE n_identificacion = ? LIMIT 1");
		$stmt->execute([$n_identificacion]);
		$num = $stmt->fetch(PDO::FETCH_NUM);

		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}

	function nombrecursoExiste($Nombrecurso)
	{
		include '../Conexion/conexion.php';
		$stmt = $bd->prepare("SELECT id_curso FROM cursos WHERE nombre_curso = ? LIMIT 1");
		$stmt->execute([$Nombrecurso]);
		$num = $stmt->fetch(PDO::FETCH_NUM);

		if ($num > 0){
			return true;
			} else {
			return false;
		}
	}
}