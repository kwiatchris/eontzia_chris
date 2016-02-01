<?php
	header('Content-Type: text/html; charset=ISO-8859-1');
	header('Access-Control-Allow-Origin: *');
	include_once 'BD/Conexion.php';
	class Dispositivo{

		public function __construct(){
			
		}

		public static function getAllDisp($id){
			$posiciones=array();
			
			try{
				//Obtener los datos de los dispositivos
				$sql="SELECT dis.Dispositivo_Id,dis.Cliente_Id,dis.Latitud,dis.Longitud,dis.Barrio,dis.Tipo,dis.Activo,L.Volumen,L.Fuego,L.Bateria,L.Fecha 
					  FROM Dispositivos as dis, Dis_datos as L LEFT JOIN Dis_datos as R			  
					  ON L.Dispositivo_Id=R.Dispositivo_Id AND L.Fecha<R.Fecha
					  WHERE isnull(R.Dispositivo_Id)AND dis.Dispositivo_Id=L.Dispositivo_Id 
					  AND Cliente_Id IN(SELECT trab.Cliente_Id
										FROM Usuarios as usu JOIN Trabajadores as trab
										ON usu.Trabajador_Id=trab.Trabajador_Id
										WHERE usu.Usuario_Id=:id)
					  ORDER BY dis.Tipo";			
				$comando=Conexion::getInstance()->getDb()->prepare($sql);
				$comando->execute(array(':id'=>$id));
				
			}catch(PDOException $e){
				//Utils::escribeLog("Error: ".$e->getMessage()." | Fichero: ".$e->getFile()." | Línea: ".$e->getLine()." [Error al insertar posicion]","debug");
				$posiciones['estado']=0;
				$posiciones['resultado']=$e->getMessage();
				return $posiciones;
			}
			
			$cuenta=$comando->rowCount();
			if($cuenta==0)//si no ha afectado a ninguna línea...
			{
				$posiciones['estado']=0;
				$posiciones['resultado']="No hay dispositivos disponibles.";
				return $posiciones;			
			}
			
			$posiciones['estado']=1;
			$posiciones['resultado']=$comando->fetchAll(PDO::FETCH_ASSOC);
			return $posiciones;

		}

		
		public static function anadirDispositivo($tipo,$inputLatitude,$inputLongitude,$usu){
			$bd=Conexion::getInstance()->getDb();
			$retVal=1;
			try{
				$sql="SELECT Cliente_Id	FROM Usuarios as usu JOIN Trabajadores as trab
					ON usu.Trabajador_Id=trab.Trabajador_Id
					WHERE usu.Usuario_Id=:usu";
					$comando=$bd->prepare($sql);
					$comando->execute(array(':usu' =>$usu ));

			
			}catch(PDOException $e){
				Utils::escribeLog("Error: ".$e->getMessage()." | Fichero: ".$e->getFile()." | Línea: ".$e->getLine()." [Usuario o email existentes]","debug");
				$retVal=0;
			return $retVal;
			}
			$result=$comando->fetch(PDO::FETCH_ASSOC);
			$idCli=$result['Cliente_Id'];
			try{ 
				$sql="INSERT INTO Dispositivos( Cliente_Id, Latitud, Longitud, Activo, Tipo) VALUES (:Cliente_Id,:Latitud,:Longitud,:Activo,:Tipo);";
				$comando=$bd->prepare($sql);
				$comando->execute(array(":Cliente_Id"=>$idCli,
					":Latitud"=>$inputLatitude,
					":Longitud"=>$inputLongitude,
					":Activo"=>1,
					":Tipo"=>$tipo));
			}catch(PDOException $e){
				//Utils::escribeLog("Error: ".$e->getMessage()." | Fichero: ".$e->getFile()." | Línea: ".$e->getLine()." [Usuario o email existentes]","debug");
				$retVal=0;
			return $retVal;
			}
			$cuenta=$comando->rowCount();
			if($cuenta==0)//Si no existe e la tabla de Dispositivos devuelve 0
			{
				//Utils::escribeLog("IdUsuario y/o correo  existentes en la BBDD -> KO","debug");
				$retVal=0;
				return $retVal;
			}
			return $retVal;
		}

		public static function ModDispositivo($dis,$cli,$latit,$longit,$tip){
			$bd=Conexion::getInstance()->getDb();
			$retVal=1;
			try{
				//$sql="UPDATE Trabajadores SET Activo='1' WHERE Trabajador_Id LIKE :id";
		//	$comando=$db->prepare($sql);
			//$comando->execute(array(':id'=>$TrabId));
				//SET `Dispositivo_Id`=[value-1],`Cliente_Id`=[value-2],`Latitud`=[value-3],`Longitud`=[value-4],`Activo`=[value-5],`Barrio`=[value-6],`Tipo`=[value-7] 
				$sql="UPDATE Dispositivos SET Latitud=:lat,Longitud=:long,Tipo=:tip WHERE Dispositivo_Id=:dis";
				$comando=$bd->prepare($sql);
				$comando->execute(array(":lat"=>$latit,
										":long"=>$longit,
										":tip"=>$tip,
										":dis"=>$dis));
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

		
		public static function getAllDispMod($id){
			$posiciones=array();
			$bd=Conexion::getInstance()->getDb();
			try{
				$sql="SELECT dis.Dispositivo_Id,dis.Cliente_Id,dis.Latitud,dis.Longitud,dis.Barrio,dis.Tipo,dis.Activo
			  		  FROM Dispositivos as dis
			  		  WHERE  Cliente_Id IN(SELECT trab.Cliente_Id
								   		   FROM Usuarios as usu JOIN Trabajadores as trab
										   ON usu.Trabajador_Id=trab.Trabajador_Id
										   WHERE usu.Usuario_Id=:id)
			  ORDER BY dis.Dispositivo_Id,dis.Tipo";
			  $comando=$bd->prepare($sql);
				$comando->execute(array(':id'=>$id));
				
			}catch(PDOException $e){
				//Utils::escribeLog("Error: ".$e->getMessage()." | Fichero: ".$e->getFile()." | Línea: ".$e->getLine()." [Error al insertar posicion]","debug");
				$posiciones['estado']=0;
				$posiciones['resultado']=$e->getMessage();
				return $posiciones;
			}
			
			$cuenta=$comando->rowCount();
			if($cuenta==0)//si no ha afectado a ninguna línea...
			{
				$posiciones['estado']=0;
				$posiciones['resultado']="No hay dispositivos disponibles.";
				return $posiciones;			
			}
			
			$posiciones['estado']=1;
			$posiciones['resultado']=$comando->fetchAll(PDO::FETCH_ASSOC);
			return $posiciones;
		}		
	}
?>