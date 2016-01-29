<?php
	header ('Content-type: text/html; charset=utf-8');
	session_start();

	require 'vendor/autoload.php';

	Slim\Slim::registerAutoloader();

	$app= new \Slim\Slim();
	$app->config(array(
		'debug' =>true ,
		'templates.path' =>'Templates'));
	//Raiz de /app
	$app-> map('/',function() use ($app){
		
		if(!isset($_SESSION['id_usuario'])){
			//render login
			$app->render('tmp_login.php');
		}
		else{
			//enviar al inicio
			$app->redirect($app->urlFor('PaginaInicio'));			
		}	
	})->via('GET')->name('Inicio');

	//anadirDispositivo
	$app->post('/anadirDispositivo',function() use ($app){
		require_once 'Modelos/Dispositivo.php';
		//require_once 'Modelos/Utils.php';
		//Utils::escribeLog("anadirDispositivo","debug");
		if(!isset($_SESSION['id_usuario'])){
			//render login
			$app->redirect($app->urlfor('Inicio'));
		}
		else{
		$req=$app->request();
		$tiposelect=$req->post('tiposelect');
		$inputLatitude=$req->post("inputLatitude");
		$inputLongitude=$req->post("inputLongitude");
		$usu=$_SESSION['id_usuario'];
		
		$result=Dispositivo::anadirDispositivo($tiposelect,$inputLatitude,$inputLongitude,$usu);
		
		//0->KO / 1->OK / 2->Existe el usuario / 3->registro OK correo KO
		/*Códigos de mensajes= 
		
		-err_reg_usr-->Error al registrar el usuario
		-usr_reg_OK-->Usuario registrado correctamente.
		-usr_em_exist-->Usuario o email existentes
		-usr_OK_em_F -->Usuario registrado, correo fallido
		*/
		if($result==1){
				$app->flash('message',"El dipsositivo insertado correctamente");
				$app->redirect($app->urlfor('panel'));
			}else if($result==0){
				$app->flashNow('message',"No existe el dipsositivo");
				$app->redirect($app->urlfor('panel'));
			}else {
				$app->flashNow('message',"El dipsositivo no est&aacute; validado, valida para poder acceder.");
				$app->redirect($app->urlfor('panel'));
			}
		}
	});
	

	//anadirTrabajador
	$app->post('/anadirTrabajador',function() use ($app){
		require_once 'Modelos/Trabajador.php';
		//require_once 'Modelos/Utils.php';
		//Utils::escribeLog("anadirTrabajador","debug");
		if(!isset($_SESSION['id_usuario'])){
			//render login
			$app->redirect($app->urlfor('Inicio'));
		}
		else{
		$req=$app->request();
		$Nombre=$req->post('Nombre');
		$inputApellido=$req->post("inputApellido");
		$Telefono=$req->post("Telefono");
		$Email=$req->post("Email");
		$select=$req->post("selectperfil");
		$client=$_SESSION['Client_Id'];
		$key=Utils::random_string(50);

		$result=Trabajador::nuevoTrabajador($Nombre,$inputApellido,$key,$client,$Email,$Telefono,$select);
		
		//0->KO / 1->OK / 2->Existe el usuario / 3->registro OK correo KO
		/*Códigos de mensajes= 
		
		-err_reg_usr-->Error al registrar el usuario
		-usr_reg_OK-->Usuario registrado correctamente.
		-usr_em_exist-->Usuario o email existentes
		-usr_OK_em_F -->Usuario registrado, correo fallido
		*/
		if($result==1){
				$app->flash('message',"El Trabajador insertado correctamente");
				$app->redirect($app->urlfor('panel'));
			}else if($result==0){
				$app->flashNow('message',"No existe el Trabajador");
				$app->redirect($app->urlfor('panel'));
			}else {
				$app->flashNow('message',"El Trabajador no est&aacute; validado, valida para poder acceder.");
				$app->redirect($app->urlfor('panel'));
			}
		}
	});
	//
	$app->get('/panelcontrol',function() use ($app){
		$app->render('tmpservicio.php');
	})->name('panel');



	//Registro
	$app->post('/registro',function()use ($app){
		require_once 'Modelos/Cliente.php';
		require_once 'Modelos/Utils.php';
		Utils::escribeLog("Inicio Registro","debug");
		
		$req=$app->request();
		$nom_empresa=trim($req->post('nombre_empresa'));
		$nom=trim($req->post("nombre"));
		$ape=trim($req->post("apellido"));
		$telef=trim($req->post("telefono"));
		$email=trim($req->post("correo"));
		$result=Cliente::nuevoCliente($nom_empresa,$nom,$ape,$email,$telef);
		//0->KO / 1->OK / 2->Existe el usuario / 3->registro OK correo KO
		/*Códigos de mensajes= 
		
		-err_reg_usr-->Error al registrar el usuario
		-usr_reg_OK-->Usuario registrado correctamente.
		-usr_em_exist-->Usuario o email existentes
		-usr_OK_em_F -->Usuario registrado, correo fallido
		*/
		if($result==0){
			//Utils::escribeLog("KO","debug");
			$mensaje= "err_reg_usr";
			$app->redirect($app->urlfor('resultado',array('mensaje'=>$mensaje)));
		}else if($result==1){
			//Utils::escribeLog("OK","debug");
			$mensaje="usr_reg_OK";
			$app->redirect($app->urlfor('resultado',array('mensaje'=>$mensaje)));
		}else if($result==2){
			//Utils::escribeLog("Existe","debug");
			$mensaje="usr_em_exist";
			$app->redirect($app->urlfor('resultado',array('mensaje'=>$mensaje)));
		}else{
			//Utils::escribeLog("Existe","debug");
			$mensaje="usr_OK_em_F";
			$app->redirect($app->urlfor('resultado',array('mensaje'=>$mensaje)));
		}
	});
	//login
	$app->post('/login',function()use ($app){
		require_once 'Modelos/Usuario.php';
		
		$usr=trim($app->request->post('NomUsuario'));
		$pass=md5(trim($app->request->post('pass')));

		if(isset($usr) && isset($pass))
		{
			$result=Usuario::comprobarUsuario($usr,$pass);
			if($result==1){
				$app->redirect($app->urlFor('PaginaInicio'));
			}else if($result==0){
				$app->flash('message',"No existe el usuario");
				$app->redirect($app->urlFor('Inicio'));
			}else {
				$app->flash('message',"El usuario no est&aacute; validado, valida para poder acceder.");
				$app->redirect($app->urlFor('Inicio'));
			}
		}else
		{
			$app->flash('message',"Faltan datos por introducir.");
			$app->redirect($app->urlFor('Inicio'));
		}		
	});

	//Validación del usuario/trabajador
	$app->get('/usuario/validar/:correo/:key',function($correo,$key) use($app){
		require_once 'Modelos/Usuario.php';		

		$result=Usuario::validarUsuario($correo,$key);
		//0-> Fail , 1->OK, 2->Ya validado,3-> OK pero correo Fail
		/*Códigos de mensajes= 
		*-codigo-->mensaje*
		-err_usr_val-->Error al validar usuario
		-val_OK-->Validación correcta. Inicia sesión para acceder..
		-usr_reg-->El usuario ya está registrado
		-usrv_OK_em_F -->Usuario validad, falló envío correo.
		*/
		if($result==0){
			//Utils::escribeLog("KO","debug");
			$mensaje= "err_usr_val";
			$app->redirect($app->urlfor('resultado',array('mensaje'=>$mensaje)));
		}else if($result==1){
			//Utils::escribeLog("OK","debug");
			$mensaje="val_OK";
			$app->redirect($app->urlfor('resultado',array('mensaje'=>$mensaje)));
		}	
		else if($result==2){
			//Utils::escribeLog("Existe","debug");
			$mensaje="usr_reg";
			$app->redirect($app->urlfor('resultado',array('mensaje'=>$mensaje)));
		}else{
			$mensaje="usrv_OK_em_F";
			$app->redirect($app->urlfor('resultado',array('mensaje'=>$mensaje)));
		}
		
	 });

	$app->get('/result/:mensaje',function($mensaje) use($app){
		/*
		-err_reg_usr-->Error al registrar el usuario
		-usr_reg_OK-->Usuario registrado correctamente.
		-usr_em_exist-->Usuario o email existentes
		-usr_OK_em_F -->Usuario registrado, correo fallido
		-err_usr_val-->Error al validar usuario
		-val_OK-->Validación correcta. Inicia sesión para acceder..
		-usr_reg-->El usuario ya está registrado
		-usrv_OK_em_F -->Usuario validad, falló envío correo.
		*/
		if($mensaje==='err_reg_usr'){
			$retmensaje="Error al registrar el usuario.";
		}else if($mensaje==='usr_reg_OK'){
			$retmensaje="Usuario registrado correctamente.";
		}else if($mensaje==='usr_em_exist'){
			$retmensaje="Usuario o email existentes.";
		}else if($mensaje==='usr_OK_em_F'){
			$retmensaje="Usuario registrado, correo fallido.";
		}else if($mensaje==='err_usr_val'){
			$retmensaje="Error al validar usuario.";
		}else if($mensaje==='val_OK'){
			$retmensaje="Validación correcta. Inicia sesión para acceder.";
		}else if($mensaje==='usr_reg'){
			$retmensaje="El usuario ya está registrado.";
		}else {
			$retmensaje="Usuario validado, falló envío correo.";
		}
		$app->render('info.php',array('mensaje'=>$retmensaje));
	})->name('resultado');
	
	$app->get('/inicio',function() use($app){
		

		if(!isset($_SESSION['id_usuario']))
		{
			//render login
			$app->flash('message',"Debe iniciar sesión para acceder.");
			$app->redirect($app->urlFor('Inicio'));
		}
		else
		{	
			$id=$_SESSION['id_usuario'];
			$json=file_get_contents('http://eontzia.zubirimanteoweb.com/app/getAllPos/?id='.$id);			
			$array=json_decode($json,true);
			$app->render('tmp_inicio.php',array('res'=>$array));
		}		
	})->name('PaginaInicio');
	
	//**********RUTAS API*************

	//****Envio de datos//****
	$app->get('/nuevaLectura/:disId/:vol/:fuego/:bate',function($disId,$vol,$fuego,$bate) use($app){
		require_once 'Modelos/DisDatos.php';
		$resp=array();
		$result=DisDatos::nuevaLectura($disId,$vol,$fuego,$bate);
		if ($result==1){
			$resp['estado']='OK';
			$resp['mensaje']='Lectura añadida correctamente.';
			echo json_encode($resp);
		}else{
			$resp['estado']='KO';
			$resp['mensaje']='Error al añadir la lectura.';
			echo json_encode($resp);
			$app->response->setStatus(406);
		}
	});

	$app->get('/logout',function()use ($app){
		session_destroy();
		$app->redirect($app->urlFor('Inicio'));
	});

	//****Recogida de lecturas realizadas por dispositivo****//
	$app->get('/getLecturas/:disId',function($disId) use($app){
		require_once 'Modelos/DisDatos.php';		
		$resp=array();
		$resultado=DisDatos::getLecturasByDisp($disId);
		if(!is_null($resultado)){
			$resp['estado']='OK';
			$resp['mensaje']=$resultado;
		}else{
			$resp['estado']='KO';
			$resp['mensaje']='No hay lecturas del dispositivo: '.$disId;
		}
		echo json_encode($resp);
	});

	$app->get('/getAllPos/',function() use($app){
		require_once 'Modelos/Dispositivo.php';
		if($app->request->get('id')==""){
			$idUsu=$_SESSION['id_usuario'];
		}else{
			$idUsu=$app->request->get('id');
		}
		
		//$idUsu='1';
		$resp=array();
		$resultado=Dispositivo::getAllDisp($idUsu);
		if($resultado['estado']==1){
			$resp['estado']='OK';
			$resp['mensaje']=$resultado['resultado'];
		}else{
			$resp['estado']='KO';
			$resp['mensaje']=$resultado['resultado'];
		}
		echo json_encode($resp);
	});

	$app->run();

	?>