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

	public static function nuevoTrabajador($nombre,$apellido,$key,$idCliente,$email,$telefono=null,$perfil=null){
		$retVal=1;
		$bd=Conexion::getInstance()->getDb();
		
		if (isset($telefono) && isset($perfil)){
			$sql="INSERT INTO Trabajadores(Nombre,Apellido,User_key,Cliente_Id,Email,Telefono,Perfil_Id) VALUES(:nom,:ape,:key,:cliId,:email,:tel,:perfil)";
			$variables=array(":nom"=>$nombre,
									 ":ape"=>$apellido,
									 ":key"=>$key,
									 ":cliId"=>$idCliente,
									 ":email"=>$email,
									 ":tel"=>$telefono,
									 ":perfil"=>$perfil);
		}else{
			$sql="INSERT INTO Trabajadores(Nombre,Apellido,User_key,Cliente_Id,Email) VALUES(:nom,:ape,:key,:cliId,:email)";
			$variables=array(":nom"=>$nombre,
									 ":ape"=>$apellido,
									 ":key"=>$key,
									 ":cliId"=>$idCliente,
									 ":email"=>$email);
		}

		try{
			$bd->beginTransaction();
			$consulta=$bd->prepare($sql);
			$consulta->execute($variables);
					
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
	public static function getAllTrabMod($id){
		$trabajadores=array();
		$bd=Conexion::getInstance()->getDb();
		try{
			$sql="SELECT Trabajador_Id, Cliente_Id, Nombre, Apellido, Telefono, Email, Activo, Fecha_creacion, Perfil_Id FROM Trabajadores WHERE Cliente_Id=:id";
			$comando=$bd->prepare($sql);
			$comando->execute(array(":id"=>$id));
		}catch(PDOException $e){
			$trabajadores['estado']=0;
			$trabajadores['resultado']=$e->getMessage();
			return $trabajadores;
		}
		$cuenta=$comando->rowCount();
		if($cuenta==0){
			$trabajadores['estado']=0;
			$trabajadores['resultado']="No hay trabajadores disponibles";
			return $trabajadores;
		}

		$trabajadores['estado']=1;
		$trabajadores['resultado']=$comando->fetchAll(PDO::FETCH_ASSOC);
		return $trabajadores;

	}

	public static function changeTrabajador($nom,$apel,$tel,$ema,$trabId){
		$bd=Conexion::getInstance()->getDb();
			$retVal=1;
			try{
				//$sql="UPDATE Trabajadores SET Activo='1' WHERE Trabajador_Id LIKE :id";
		//	$comando=$db->prepare($sql);
			//$comando->execute(array(':id'=>$TrabId));
				//SET `Dispositivo_Id`=[value-1],`Cliente_Id`=[value-2],`Latitud`=[value-3],`Longitud`=[value-4],`Activo`=[value-5],`Barrio`=[value-6],`Tipo`=[value-7] 
				$sql="UPDATE Trabajadores SET Nombre=:no, Apellido=:ape, Telefono=:te,Email=:em WHERE Trabajador_Id=:traId";
				
				$comando=$bd->prepare($sql);
				$comando->execute(array(":no"=>$nom,
										":ape"=>$apel,
										":te"=>$tel,
										":em"=>$ema,
										":traId"=>$trabId));
			}catch(PDOException $e){
				Utils::escribeLog("Error: ".$e->getMessage()." | Fichero: ".$e->getFile()." | Linea: ".$e->getLine()." []","debug");
				$retVal=0;
				return retVal;
			}
			if($comando->rowCount()==0){
				Utils::escribeLog("Error al validar","debug");
				$retVal=0;
				return $retVal;
			}
			return $retVal;

	}
	
}