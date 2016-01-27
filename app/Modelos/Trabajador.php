<?php
header('Content-Type: text/html; charset=ISO-8859-1');
include_once 'BD/Conexion.php';
include_once 'CorreoUser.php';
require_once 'Utils.php';

/**
* CLASE Cliente
*/
class Trabajador 
{

	function __construct()
	{

	}

	public static function nuevoTrabajador($nombre,$apellido,$key,$idCliente,$email){
		$retVal=1;
		$bd=Conexion::getInstance()->getDb();

		try{
			$bd->beginTransaction();
			$sql="INSERT INTO Trabajadores(Nombre,Apellido,User_key,Cliente_Id,Email) VALUES(:nom,:ape,:key,:cliId,:email)";
			$consulta=$bd->prepare($sql);
			$consulta->execute(array(":nom"=>$nombre,
									 ":ape"=>$apellido,
									 ":key"=>$key,
									 ":cliId"=>$idCliente,
									 ":email"=>$email));
					
			$bd->commit();
			$res2=$bd->prepare("SELECT MAX(Trabajador_Id)as Trabajador_Id from Trabajadores");
			$res2->execute();
		}catch(PDOException $e){
			$retVal=0;
			$bd->rollback();
			return $retVal;
		}
		
		$idres2=$res2->fetch(PDO::FETCH_ASSOC);
		$idTrab=$idres2['Trabajador_Id'];
		$cuenta=$consulta->rowCount();
		if($cuenta==0)
		{
			//Utils::escribeLog("nom_empresa y/o correo  existentes en la BBDD -> KO","debug");
			$retVal=2;
			return $retVal;
		}
		 $idUsuario=mb_strtolower($nombre[0].$apellido.$idTrab,'UTF-8');
		 $correouser=new CorreoUser();
		 $res=$correouser->enviarCorreoRegistro($idUsuario,$nombre,$apellido,$email,$key);
		 if(!$res){
		 	$retVal=3;
		 	return $retVal;
		 }
		 return $retVal;
	}
}