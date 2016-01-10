<?php
//include_once 'BD/Conexion.php';
//$nombre=$_POST['name'];
/*try{
			//si la cuenta da 0 insertar
			//$sql="INSERT INTO Clientes(Nombre_empresa,Nombre,Apelido,Password,Email,Direccion,Telefono,Fecha_crear)VALUES
			//(:nom_empresa,:nombre,:ape,:contra,:email,:dir,:tel,:fecha)";
			//INSERT INTO `Clientes`(`Client_Id`, `Nombre`, `Apelido`, `Password`, `Direccion`, `Ciudad`, `Telefono`, `Email`, `Comprado`, `User_key`, `Fecha_creacion`, `otra`, `NIF`, `fecha_modif`)
			
			$sql22="INSERT INTO `eontzia`.`Clientes` (`Client_Id`, `Nombre`, `Comprado`, `Fecha_creacion`, `Comentarios`, `NIF`, `fecha_modif`, `id_Contacto`) VALUES (NULL, '$nombre', '0', CURRENT_TIMESTAMP, '', '', NOW(), NULL);";
			
			$comando=null;
			$comando=Conexion::getInstance()->getDb()->prepare($sql22);
			$comando->execute();
		}catch(PDOException $e){
			//Utils::escribeLog("Error: ".$e->getMessage()." | Fichero: ".$e->getFile()." | Línea: ".$e->getLine()." [Error al insertar usuario]","debug");
			$retVal=0;
			return $retVal;
		}*/
?>