 <?php
	header('Content-Type: text/html; charset=ISO-8859-1');
	//require_once 'class.phpmailer.php';
	//include_once 'class.smtp.php';
	//include_once 'keys.php';		
	//require_once 'Utils.php';
	
	date_default_timezone_set('Etc/UTC');

	class CorreoUser {
		private $host;
		private $port;
		private $usernameFrom;
		private $pass;
		private $FromName;
		private $ReplyTo;

		public function __construct(){
			$this->host='smtp.gmail.com';
			$this->port=587;
			$this->usernameFrom=CORREO;
			$this->pass=PASS;
			$this->FromName='Administrador E-ontzia';
			$this->ReplyTo='Administrador E-ontzia';
		}

		public function enviarCorreoRegistro($idUsuario,$Nombre,$ape1,$correo,$key,$ape2=""){			
			Utils::escribeLog("Inicio PHPMailer","debug");
			$URL="http://eontzia.zubirimanteoweb.com/app/usuario/validar/".$correo."/".$key;			
			//$URL="http://localhost/workspace/eontziApp/app/usuario/validar/".$correo."/".$key;
			$Subject='Bienvenido a EontziApp';
			$mensaje="<div><h1>Bienvenido/a ".$Nombre." ".$ape1;
			$mensaje.=' a eontziApp</h1><br/><p>Se ha creado un usuario para acceder a la aplicación.</p><br/>
				<p>Su nombre de usuario: '.$idUsuario.'</p> <p>Su contraseña: changeme</p><p>Su correo: '.$correo.'</p>
				<p>Ha sido inscrito correctamente, para poder acceder a la aplicación debe validar su usuario. Para validar, pulse <a href="'.$URL.'">aquí.</a></p></div>';
	
			return $this->EnviarCorreo($Nombre,$ape1,$correo,$URL,$Subject,$mensaje);
		}

		public function enviarConfirmValidacion($Nombre,$ape1,$correo){			
			Utils::escribeLog("Inicio PHPMailer confirmValidar","debug");
			$URL="http://eontzia.zubirimanteoweb.com/app";
			//$URL="http://localhost/workspace/eontziApp/app/";
			$Subject = 'Validacion de usuario realizado correctamente';
			$mensaje="<div><h2>Bienvenido/a ".$Nombre." ".$ape1;				
			$mensaje.=' a EontziApp</h2><p>Se ha confirmado correctamente su solicitud de validación de usuario en <b>EontziApp</b></p>					
				<p>Puede iniciar sesión y acceder a la aplicación desde <a href="'.$URL.'">aquí.</a></p> Se recomienda cambiar de contraseña.</div>';
			return $this->EnviarCorreo($Nombre,$ape1,$correo,$URL,$Subject,$mensaje);			
		}

		public function EnviarCorreo($Nombre,$ape1,$Correo,$URL,$Subject,$Mensaje)
		{
			try{
				$mail = new PHPMailer();
				$mail->isSMTP();
				
				$mail->SMTPSecure = 'tls';
				$mail->Host = $this->host;
				$mail->Port = $this->port;

				$mail->SMTPAuth = true;
				$mail->Username = $this->usernameFrom;
				$mail->Password = $this->pass;

				$mail->SMTPDebug=0;
				//$mail->Debugoutput = 'html';

				$mail->addAddress($Correo,$Nombre);			
				
				$mail->From=$this->usernameFrom;
				$mail->FromName=$this->FromName;
				$mail->addReplyTo($this->usernameFrom,$this->ReplyTo);
				$mail->Subject = $Subject;
				$mail->WordWrap= 50;		

				$mail->msgHTML($Mensaje);
				
				$mail->isHTML(true);

				$mail->send();

			}catch(phpmailerException $me){
				Utils::escribeLog("Error: ".$me->getMessage()." | Fichero: ".$me->getFile()." | Línea: ".$me->getLine()." [Error al enviar correo]","debug");
				return false;
			}catch(Exception $e){
				Utils::escribeLog("Error: ".$e->getMessage()." | Fichero: ".$e->getFile()." | Línea: ".$e->getLine()." [Error al enviar correo]","debug");
				return false;
			}			
			return true;
		}
	}
?>