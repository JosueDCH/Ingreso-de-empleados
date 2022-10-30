<?php

include_once 'Database.php';
include_once 'empleados.php';

$database = new Database();
$db = $database->getConnection();

$item = new Empleados($db);

if (isset($_POST['txtid'])&&
	isset($_POST['txtnombres'])&&
	isset($_POST['txtapellidos'])) 
{
	$idemple  = $_POST['txtid'];
	$pais = $_POST['pais'];
	$nombres = $_POST['txtnombres'];
	$apellidos = $_POST['txtapellidos'];
	$fecha_nacimiento = $_POST['fecha'];
	$sexo = $_POST['sexo'];
	$estado_civil = $_POST['estado'];

	$item->idemple = $idemple;
	$item->pais = $pais;
	$item->nombres = $nombres;
	$item->apellidos = $apellidos;
	$item->fecha_nacimiento = $fecha_nacimiento;
	$item->sexo = $sexo;
	$item->estado_civil = $estado_civil;

	if ($item->creatEmple()) {
		echo "Empleado creado";
	}
	else
	{
		echo "Empleado no creado";
	}

}

?>