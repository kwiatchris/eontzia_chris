<!DOCTYPE html>
<html>
<head>
<script src="//fast.eager.io/_uPAxwoIB0.js"></script>
	<link rel="stylesheet" type="text/css" href="./Templates/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="icon" type="image/ico" href="../img/favicon.ico"/>
	<link rel="shortcut icon" href="../img/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script> 

<script src="../js/bootstrapValidator.min.js"></script>

</head>
<body>

	<!--Cabecera-->
	<nav id="cabecera" class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">	
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>							
				<a id="titulo" href="http://eontzia.zubirimanteoweb.com/app">
					<img class="logo" src="../img/logo_sin.png">
					<span class="site-name">E-ontziApp</span>
					<span class="site-desc">Web de E-ontzia.</span>
				</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">			
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido'] ?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a id="linkperfil" href="#linkperfil"><span class="showopacity glyphicon glyphicon-user"></span> Perfil</a></li>
							<li><a href="logout"><span class="showopacity glyphicon glyphicon-off"></span> Cerrar sesi&oacute;n</a></li>                  
						</ul>
					</li>     
				</ul>
			</div><!-- /.navbar-collapse -->
  		</div><!-- /.container-->
	</nav>

	<?php if(isset($flash['message'])):?>
				<div class="alert alert-info fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Atenci&oacute;n!</strong> <?php echo $flash['message']?>
				</div>
			<?php endif; ?>
	<!--Contenido-->
	<div id="cont-fluid" class="container-fluid">
		<div id="dispos" class="col-xs-12 col-md-12 col-lg-12">
	<!-- Zakładki -->
<ul class="nav nav-tabs" role="tablist" color="red">
  <li class="active "><a id="glyph" class="glyphicon glyphicon-plus" href="#1zakladka" role="tab" data-toggle="tab"> Añadir Dispositivo</a></li>
  <li><a class="glyphicon glyphicon-edit" id="33zakladka" href="#3zakladka" role="tab" data-toggle="tab"> Modificar Dispositivo</a></li>
  <li><a class="glyphicon glyphicon-plus "aria-hidden="true" href="#2zakladka" role="tab" data-toggle="tab"> Añadir Trabajador</a></li>
    <li><a class="glyphicon glyphicon-edit "aria-hidden="true" href="#5zakladka" role="tab" data-toggle="tab"> Modificar Trabajador</a></li>
  <li><a class="glyphicon glyphicon-edit "id="4zakladka" href="#4zakladka" role="tab" data-toggle="tab"> Modificar Cliente</a></li>
</ul>
<!-- Zawartość zakładek -->
<div class="tab-content">
<!-- Zawartość zakładki 1 -->
		  <div class="tab-pane active col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6" id="1zakladka"  >
		  		  <form action="anadirDispositivo" method="post" id="anadirDispositivo">
		        <div class="form-group" >
		            <label  class="col-xs-2">TIPO</label>
		            <select id="tiposelect" name="tiposelect" class="form-control">
					<option value="1">Rechazo</option>
					<option value="2">Plástico</option>
					<option value="3">Papel</option>
					<option value="4">Orgánico</option>
					<option value="5">Vidrio</option>
					<option value="6">Aceite</option>
					<option value="7">Ropas</option>
					<option value="8">Pilas</option>
					</select>
		        </div>
		        <div>
		        <button  class="btn btn-default" id="buscarCoordenadas">Obtener Coordenadas</button>
		        <a href="#myMapModal" class="btn" data-toggle="modal">Launch Map Modal</a>
		        </div>
		        <!--MODAL MAPA-->
		        <div class="modal fade" id="myMapModal">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				                 <h4 class="modal-title">Modal title</h4>

				            </div>
				            <div class="modal-body">
				                <div class="container">
				                    <div class="row">
				                        <div id="map-canvas" class=""></div>
				                    </div>
				                </div>
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				                <button type="button" class="btn btn-primary">Save changes</button>
				            </div>
				        </div>
				        <!-- /.modal-content -->
				    </div>
				    <!-- /.modal-dialog -->
				    </div>
    <!-- /END modal MAPA -->
		        <div class="form-group">
		            <label for="inputLatitude" class="col-xs-2">Latitude</label>
		            <input  class="form-control" id="inputLatitude" name="inputLatitude" placeholder="Latitude">
		        </div>
		        <div class="form-group">
		            <label for="inputLongitude" class="col-xs-2">Longitude</label>
		            <input  class="form-control" id="inputLongitude" name="inputLongitude" placeholder="Longitude">
		        </div>
		        <button type="submit" class="btn btn-primary" >Añadir</button>
		    </form>
		  </div>
		  <!-- Zawartość zakładki 2 -->
		  <div class="tab-pane col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6" id="2zakladka">
		  		  <form  action="anadirTrabajador"  method="post" id="anadirTrabajador" >
		  		  <div class="form-group">
			            <label  class="col-xs-2">Nombre</label>
			            <input type="text"  required="required" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
			      </div>
			       <div class="form-group">
			            <label for="inputApellido" class="col-xs-2">Apellido</label>
			            <input type="text"  required="required" class="form-control" id="inputApellido" name="inputApellido" placeholder="Apellido">
			        </div>
			        <div class="form-group">
			            <label  class="col-xs-2">Telefono</label>
			            <input type="text" class="form-control"  name="Telefono" placeholder="Telefono">
			        </div>
			        <div class="form-group">
			            <label  class="col-xs-2">Email</label>
			            <input type="text" class="form-control" id="inputEmail" name="Email" placeholder="Email">
			        </div>
			        <div class="form-group">
			             <label  class="col-xs-2">Perfil</label>
		            <select class="form-control" class="selectpicker" id="selectperfil" name="selectperfil">
		            	<option value="2">Usuario</option>
		            	<option value="0">Administrator</option>
					 	<option id="encargado" name="encargado" value="1">Encargado</option>
					</select>
					</div>
			        <div id="errorbox" style="color:red"></div>
			       <!-- <input id="btn" type="submit" value="ENVIAR"/>         -->
			         <button id="btnTrabajador" type="submit" class="btn btn-primary">Añadir</button>
			    </form>

		  </div>
		  <!--zawartos zakladnki 5-->
		  <div class="tab-pane " id="5zakladka">
		  	
		  	<div class="container">
					  <h2>Lista de los trabajadores</h2>
					  <div id="trablist"class="list-group">
					  		 <script>
					  //AJAX PARA RECOGER EL DISPOSITIVO
					  var myTrabajador= {};
					  $.ajax({
								type:"GET",
								//url:"http://localhost:8080/eontziApp/app/getAllPos",	
								//url:"http://eontzia.zubirimanteoweb.com/app/getAllPos",
								url:"http://localhost/Aitor/classes/chris_residuos/eontzia_/new_eontzia/eontzia/app/getAllTrabMod",
								dataType:"JSON",
								data:"",
								success:function(data){
									if(data.estado=="OK"){
										myTrabajador.data = data.mensaje;
										console.log(data.mensaje);
											$.each(data.mensaje, function(kk,trab) {
											 //$.each(vv, function(k, v) {
											  	//console.log(vv);
											  	var a=document.getElementById("trablist");
											  	$(a).append("<a id="+trab['Trabajador_Id']+" class='list-group-item'><h4 class='list-group-item-heading'>ID de trbajador :"+
											  		trab['Trabajador_Id']+"<br>Nombre :"+trab['Nombre']+"<br> Apellido : "+trab['Apellido']+ "<br> Telefono :"+trab['Telefono']+"</h4><p class='list-group-item-text'> </p></a>");
											    
											  //});
											});  
									}
								},
								beforeSend:function(){
								},
								complete:function(){
								},
								error:function(){
								}
							});
					//END OF AJAX DEL DISPOSITIVO
						</script>	
					  </div>

				
		  	</div>
		  		<!-- Modal -->
							<div id="myModalTrabajadores" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content modificarTrabajador-->
							    <form  action="modificarTrabajador" id="modificarTrabajador" method="post">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">Datos del Trabajador</h4>
							      </div>
							      <div class="modal-body">
							     		 <div class="form-group" >
								            <label  class="col-xs-2">Trabajador_Id</label>
								            <input type="text" class="form-control" id="TrabId" name="TrabId" placeholder="Email" readonly>
								        </div>
							      		<div class="form-group">
								            <label  class="col-xs-4">Fecha creacion</label>
								            <input type="text"  required="required" class="form-control" id="TrabFecha" name="TrabFecha" readonly>
								      </div>
							      		<div class="form-group">
								            <label  class="col-xs-2">Nombre</label>
								            <input type="text"  required="required" class="form-control" id="TrabNombre" name="TrabNombre" placeholder="Nombre">
								      </div>
								       <div class="form-group">
								            <label for="inputApellido" class="col-xs-2">Apellido</label>
								            <input type="text"  required="required" class="form-control" id="TrabApellido" name="TrabApellido" placeholder="Apellido">
								        </div>
								        <div class="form-group">
								            <label  class="col-xs-2">Telefono</label>
								            <input type="text" class="form-control"  id="TrabTelefono" name="TrabTelefono" placeholder="Contasena">
								        </div>
								        <div class="form-group">
								            <label  class="col-xs-2">Email</label>
								            <input type="text" class="form-control" id="TrabEmail" name="TrabEmail" placeholder="Email">
								        </div>
								        
								         
								        
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button  onclick="formHasChanged()" type="submit" class="btn btn-primary">Modificar</button>
							      </div>
							    </div>
							    </form>
							  </div>
							</div>
							<!--end of MODAL modificarTrabajador-->
		  	</div>
		          <div class="modal fade" id="contrasenaModal">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				                 <h4 class="modal-title">CAMBIAR LA CONTRASENA</h4>

				            </div>
				            <div class="modal-body">
				                <div class="container">
				                    <div class="row">
				                        <div id="map-canvas" class=""></div>
				                    </div>
				                </div>
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				                <button type="button" class="btn btn-primary">Save changes</button>
				            </div>
				        </div>
				        <!-- /.modal-content -->
				    </div>
				    <!-- /.modal-dialog -->
				    </div>
    <!-- /END modal CONTRASENA -->
<!-- MODAL PERFIL-->

							<div id="modalperfil" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content modificarTrabajador-->
							    <form  action="modalperfil" id="modalperfil" method="post">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">PERFIL</h4>
							      </div>
							      <div class="modal-body">
							     		 <div class="form-group" >
								            <label  class="col-xs-2">Trabajador_Id</label>
								            <input type="text" class="form-control" id="TrabId" name="TrabId" placeholder="Email" readonly>
								        </div>
							      		<div class="form-group">
								            <label  class="col-xs-4">Fecha creacion</label>
								            <input type="text"  required="required" class="form-control" id="TrabFecha" name="TrabFecha" readonly>
								      </div>
							      		<div class="form-group">
								            <label  class="col-xs-2">Nombre</label>
								            <input type="text"  required="required" class="form-control" id="TrabNombre" name="TrabNombre" placeholder="Nombre">
								      </div>         
								        
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button  onclick="formHasChanged()" type="submit" class="btn btn-primary">Modificar</button>
							      </div>
							    </div>
							    </form>
							  </div>
							</div>
							<!--end of MODAL PERFIL-->

-->
	<!-- Zawartość zakładki 3 -->
		  <div class="tab-pane" id="3zakladka">
		  
		  		  <form  action="modyficarDispositivos"  method="post" id="modyficarDispositivos" >
		  		  
			       <div class="container">
					  <h2>Lista de los Dispositivos</h2>
					  <div id="list"class="list-group">
					 	<!--<a id="2" class="list-group-item"></a>-->
					  <script>
					  //AJAX PARA RECOGER EL DISPOSITIVO
					  var myData= {};
					  $.ajax({
								type:"GET",
								//url:"http://localhost:8080/eontziApp/app/getAllPos",	
								//url:"http://eontzia.zubirimanteoweb.com/app/getAllPos",
								url:"http://localhost/Aitor/classes/chris_residuos/eontzia_/new_eontzia/eontzia/app/getAllDispMod/",
								dataType:"JSON",
								data:"",
								success:function(data){
									if(data.estado=="OK"){
										myData.data = data.mensaje;
										//console.log(data.mensaje);
											$.each(data.mensaje, function(kk,vv) {
											 //$.each(vv, function(k, v) {
											  	//console.log(vv);
											  	var a=document.getElementById("list");
											  	$(a).append("<a id="+vv['Dispositivo_Id']+" class='list-group-item'><h4 class='list-group-item-heading'>ID de dispositivo :"+vv['Dispositivo_Id']+"<img src='http://eontzia.zubirimanteoweb.com/app/Templates/img/Container/tipo_"+vv['Tipo']+".png' >"+"</h4><p class='list-group-item-text'> </p></a>");
											    
											  //});
											});  
									}
								},
								beforeSend:function(){
								},
								complete:function(){
								},
								error:function(){
								}
							});
					//END OF AJAX DEL DISPOSITIVO
						</script>					  	  
						</div>
		        <div id="errorbox" style="color:red"></div>
			       <!-- <input id="btn" type="submit" value="ENVIAR"/>         -->
			         <!-- <button id="btnmodyficarDispositivos" type="submit" class="btn btn-primary">Modificar</button> -->
			    </form>
			    				<!-- Modal -->
							<div id="myModalDispositivo" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <form  action="btnmodDispositivos" id="modDispositivos" method="post">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">Datos del Dispositivo</h4>
							      </div>
							      <div class="modal-body">
							      		 <div class="form-group">
								            <label  class="col-xs-2">Dispositivo_Id</label>
								            <input type="text" class="form-control" id="inputDisId" name="inputDisId" placeholder="Dispositivo_Id" readOnly="true">
								        </div>
							           <div class="form-group">
								            <label  class="col-xs-2">Latitude</label>
								            <input  type="text" class="form-control" id="inputLatitude" name="inputLatitude" placeholder="Latitude">
								        </div>
								        <div class="form-group">
								           <label  class="col-xs-2">Longitude</label>
								            <input  type="text" class="form-control" id="inputLongitude" name="inputLongitude" placeholder="Longitude">
								      	</div>
								      <div class="form-group">
								       
								           <label  class="col-xs-2">Activo</label>
								           <select class="form-control"  class="selectpicker" id="Activo" name="Activo" placeholder="Activo">
								            <option value="0">NO</option>
								            <option value="1">YES</option>
								           </select>
								        </div>      
								         <label  class="col-xs-2">Tipo</label>
								        <select class="form-control" class="selectpicker"  id="Tipo" name="Tipo">
								        	<option value="1">Rechazo</option>
							            	<option value="2">Plástico</option>
							            	<option value="3">Papel</option>
										 	<option value="4">Orgánico</option>
										 	<option value="5">Vidrio</option>
										 	<option value="6">Aceite</option>
										 	<option value="7">Ropas</option>
										 	<option value="8">Pilas</option>
										</select>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button  onclick="formHasChanged()" type="submit" class="btn btn-primary">Modificar</button>
							      </div>
							    </div>
							    </form>
							  </div>
							</div>
							<!--end of MODAL-->
					</div>
					<!-- Modal -->
							<div id="myModalCliente" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <form action="modCliente" id="btnmodCliente" method="post">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">Datos del Dispositivo</h4>
							      </div>
							      <div id="Clientebody" class="modal-body">
							      		<div class="form-group">
						           			 <label  class="col-xs-2">Nombre de la empresa</label>
						            		<input type="text"  required="required" class="form-control" id="Nombre_empresa" name="Nombre_empresa" placeholder="Nombre_empresa">
								   	   </div>
								       <div class="form-group">
								            <label class="col-xs-2">Comprado</label>
								            <select class="form-control selectpicker" id="Comprado" name="Comprado" placeholder="Comprado" >
								            	<option value="0">NO</option>
								            	<option value="1">SI</option>
								            </select>
								        </div>
								        <div class="form-group">
								            <label  class="col-xs-2">Comentarios</label>
								            <input type="text" class="form-control"  id="Comentarios" name="Comentarios" placeholder="Comentarios">
								        </div>
								        <div class="form-group">
										<label  class="col-xs-2">NIF</label>
								            <input type="text" class="form-control" id="NIF" name="NIF" placeholder="NIF">
								  		</div>
								        <div class="form-group">
								       		<label  class="col-xs-2">Nombre de contacto</label>
								            <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" placeholder="Nombre de contacto">
								     	</div>
								        <div class="form-group">
								            <label  class="col-xs-2">Apellido</label>
								            <input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="Apellido">
								        </div>
								        <div class="form-group">
								       		<label  class="col-xs-2">Correo</label>
								            <input type="text" class="form-control" id="Correo" name="Correo" placeholder="Correo">
								     	</div>
								        <div class="form-group">
								       		<label  class="col-xs-2">Telefono</label>
								            <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Telefono">
								     	</div>
			        
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button id="" type="submit" class="btn btn-primary">Modificar</button>
							      </div>
							    </div>
							    </form>
							  </div>
							</div>
					  </div>
		 </div>	
	</div>
</div>
<!-- snip COGER EL VARIABLE Y PASAR AL JS-->
<div id="dom-target" style="display: none;">
    <?php 
        $output = $_SESSION['Client_Id']; //Again, do some operation, get the output.
        echo htmlspecialchars($output); /* You have to escape because the result
                                           will not be valid HTML otherwise. */
    ?>
</div>	
<!---snip end-->
</body>
<script src="http://maps.googleapis.com/maps/api/js"></script>
</html>
<script>
	function formHasChanged(){	
		var modalinputDischange = new Array();
		var somethingChanged =false;
		modalinputDischange.push($('.modal-body #inputLatitude').val());
		modalinputDischange.push($('.modal-body #inputLongitude').val());
		modalinputDischange.push($('.modal-body #Tipo').val());
		modalinputDischange.push($('.modal-body #Activo').val());
		//console.log(modalinputDischange);
		
		if(modalinputDischange.toString()==modalinputDis.toString()){
			//console.log("egual");	
			somethingChanged=false; 
			alert("No has modificado nada");
			 
		}else{
			//console.log("not egual");  
			somethingChanged=true;
		}

		if(somethingChanged==false){
			$("#modDispositivos").submit(function(e){
					e.preventDefault();
			        return false;
			    });

		}else{ $("#modDispositivos").unbind('submit').submit();}
	}
		
//  AJAX PARA RECOGER EL CLIENTE 
    var div = document.getElementById("dom-target");
    var ID = div.textContent;
	  var myClient= {};
					  $.ajax({
								type:"GET",
								//url:"http://localhost:8080/eontziApp/app/getAllPos",	
								//url:"http://eontzia.zubirimanteoweb.com/app/getAllPos",
								url:"http://localhost/Aitor/classes/chris_residuos/eontzia_/new_eontzia/eontzia/app/getCliente/"+ID,
								dataType:"JSON",
								data:"",
								success:function(data){
									//console.log(data);
									if(data.estado=="OK"){
										myClient.data=data.mensaje;
										//console.log(myClient);
										$('.modal-body #Nombre_empresa').val(data.mensaje['Nombre']);
										//myData.data = data.mensaje;
										//console.log(data.mensaje);
											//$.each(data.mensaje, function(kk,vv) {
											 //$.each(vv, function(k, v) {
											  	//console.log(vv);
											  	//var a=document.getElementById("list");
											  	//$(a).append("<a id="+vv['Dispositivo_Id']+" class='list-group-item'><h4 class='list-group-item-heading'>ID de dispositivo :"+vv['Dispositivo_Id']+"<img src='http://eontzia.zubirimanteoweb.com/app/Templates/img/Container/tipo_"+vv['Tipo']+".png' >"+"</h4><p class='list-group-item-text'>El volumen es:"+vv['Volumen']+" </p></a>");
												  //});
											//});		  
									}
								},
								beforeSend:function(){
								},
								complete:function(){
								},
								error:function(){
								}
							});
//END OF AJAX RECOGER EL CLIENTE
</script>
<script type="text/javascript">
var modalinputDis = new Array();
$('#linkperfil').click(function(){
	$('#modalperfil').modal('show');
});
 $("#buscarCoordenadas").click( function()
           {
             alert("Problem obteniendo coordenadas. Hay que añadirlas manualmente");
             $("#inputLatitude").focus(); 
             return false;
           }

        );
  $('#encargado').click( function(){
        alert("selected");
  });
  // FUNCIONAMIENTO DEL MODAL DE DISPOSITIVO
  $("#33zakladka").click(function(){
  	$(".list-group a").click(function() {
       //alert('Dispositivo con ID ' + this.id);
       //console.log(myData);
        for (var s in myData.data) {
    if (myData.data[s]["Dispositivo_Id"] == this.id){
       //console.log(myData.data[s]);
   		    //console.log(myData.data[s]['Latitud']);
   		$('.modal-body #inputLatitude').val(myData.data[s]['Latitud']);
   		$('.modal-body #inputLongitude').val(myData.data[s]['Longitud']);
   		$('.modal-body #Tipo').val(myData.data[s]['Tipo']);
   		$('.modal-body #inputDisId').val(myData.data[s]['Dispositivo_Id']);
   		$('.modal-body #Activo').val(myData.data[s]['Activo']);
   		modalinputDis.push($('.modal-body #inputLatitude').val(),$('.modal-body #inputLongitude').val(),$('.modal-body #Tipo').val(),$('.modal-body #inputDisId').val());
   		//console.log(modalinputDis);
			}
		}
       //	$('.modal-body #inputLatitude').val(latitude);     
       	$('#myModalDispositivo').modal('show');
    //    	$("#myModalDispositivo").on('shown', function() {
    //     $(this).find("#inputLatitude").focus();
    // });	 
	}); 
	 
});
  //END OF MODAL DEL DISPOSITIVO
  //MODAL DEL CLIENTE
  $("#4zakladka").click(function(){
  	console.log(myClient);
  	// for (var s in myClient.data) {
   //       console.log(myClient.data[s]);
   // 		$('.modal-body #Nombre_empresa').val(myClient.data[0]['Nombre']);
   // 		$('.modal-body #Comprado').val(myClient.data[0]['Comprado']);
   // 		$('.modal-body #Comentarios').val(myClient.data[0]['Comentarios']);
   // 		$('.modal-body #NIF').val(myClient.data[0]['NIF']);
   // 		$('.modal-body #nombre_contacto').val(myClient.data[0]['Nombre_contacto']);
   // 		$('.modal-body #Apellido').val(myClient.data[0]['Apellido_contacto']);
   // 		$('.modal-body #Correo').val(myClient.data[0]['Correo_contacto']);
   // 		$('.modal-body #Telefono').val(myClient.data[0]['Tel_contacto']);
			// }
 
  		$('#myModalCliente').modal('show');
  });
  //END OF MODAL DEL CLIENTE

//VALIDAR EL TRABAJADOR
 var reglas = {  
	 Nombre: {required:true,minlength:3},  
	 inputApellido:{required:true,minlength:3},
	 Email:{required: true, email:true}, 
	Telefono:{required:true,digits:true,minlength:9},
 
	};  
	var mensajes = {  
	 Nombre: {required:"Nombre Requerido",minlength:"El nombre demasiado corto"}, 
	 inputApellido:{required:"Nombre required",minlength:"El apellido demasiado corto"}, 
	 Email:{required:"Email Requerido", email:"Formato de Email incorrecto"},  
	 Telefono:{required:"falta numero", digits:"aceptados solo numeros",min:"el numero incorecto"},
	
	};  
	  $(document).ready (  
	function(){  
		$("#anadirTrabajador").validate ({  
		 rules:reglas,  
		 messages:mensajes,
		 //debug:true,
		 // focusCleanup:true,
		  //mueve el error al un contenedor
		 // errorLabelContainer:"#errorbox",
		  //  focusInvalid: false,
		    //hace focus en el primer error
		 // invalidHandler: function(form, validator) {
       // var errors = validator.numberOfInvalids();
       // if (errors) {                    
       //     validator.errorList[0].element.focus();
       // }
         highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
	

}); 
//END OF VALIDAR DEL TRABAJADOR
//VALIDAR EL DISPOSITIVO
//zakladka 5
  $("#5zakladka").click(function(){
  	$(".list-group a").click(function() {
       //alert('Dispositivo con ID ' + this.id);
       //console.log(myData);
        for (var s in myTrabajador.data) {
    if (myTrabajador.data[s]["Trabajador_Id"] == this.id){
       console.log(myTrabajador.data[s]);
   		    //console.log(myData.data[s]['Latitud']);
   		$('.modal-body #TrabFecha').val(myTrabajador.data[s]['Fecha_creacion']);
   		$('.modal-body #TrabNombre').val(myTrabajador.data[s]['Nombre']);
   		$('.modal-body #TrabApellido').val(myTrabajador.data[s]['Apellido']);
   		$('.modal-body #TrabTelefono').val(myTrabajador.data[s]['Telefono']);
   		$('.modal-body #TrabEmail').val(myTrabajador.data[s]['Email']);
   		$('.modal-body #TrabId').val(myTrabajador.data[s]['Trabajador_Id']);
   		//modalinputTrab.push($('.modal-body #TrabNombre').val(),$('.modal-body #inputLongitude').val(),$('.modal-body #Tipo').val(),$('.modal-body #inputDisId').val());
   		//console.log(modalinputDis);
			}
		}
       //	$('.modal-body #inputLatitude').val(latitude);     
       	$('#myModalTrabajadores').modal('show');
    //    	$("#myModalDispositivo").on('shown', function() {
    //     $(this).find("#inputLatitude").focus();
    // });	 
	}); 
	 
});
var reglasDispositivo={
	inputLatitude:{required:true,floatvalid:true},
	inputLongitude:{required:true,floatvalid:true},
};
var mensajesDispositivo={
	inputLatitude:{required:"Lotitude obligatoria",digits:"aceptados solo numeros"},
	inputLongitude:{required:"Longitude obligatoria",digits:"aceptados solo numeros"},
};
  jQuery.validator.addMethod('floatvalid', function(value) { return (value.match(/^\-?([0-9]+(\.[0-9]+)?|Infinity)$/)); }, 'Please enter a valid number');
//jQuery.validator.addMethod('floaton', function(value){return (value.match(/^\-?([0-9]+(\.[0-9]+)?/));}'insertar numero corecto');
$(document).ready(function(){
 		$("#anadirDispositivo").validate ({  
		 rules:reglasDispositivo,  
		 messages:mensajesDispositivo,
		 //debug:true,
		 // focusCleanup:true,
		  //mueve el error al un contenedor
		 // errorLabelContainer:"#errorbox",
		  //  focusInvalid: false,
		    //hace focus en el primer error
		 // invalidHandler: function(form, validator) {
       // var errors = validator.numberOfInvalids();
       // if (errors) {                    
       //     validator.errorList[0].element.focus();
       // }
         highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }

    });
});
//END OF VALIDAR EL DISPOSITIVO
//MAPA EN EL MODAL
var map;        
var myCenter=new google.maps.LatLng(43.319275, -1.979313);
var marker=new google.maps.Marker({
    position:myCenter
    //animation:google.maps.Animation.BOUNCE

});
function placeMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map,
  });
/*  var infowindow = new google.maps.InfoWindow({
    content: 'Latitude: ' + location.lat() +
    '<br>Longitude: ' + location.lng()
  });
  infowindow.open(map,marker);*/
}
function initialize() {
  var mapProp = {
      center:myCenter,
      zoom: 14,
      draggable: true,
      scrollwheel: true,
      mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  map=new google.maps.Map(document.getElementById("map-canvas"),mapProp);
  marker.setMap(map);
    
  google.maps.event.addListener(marker, 'click', function() {
      
    infowindow.setContent(contentString);
    infowindow.open(map, marker);
    placeMarker(event.latLng);
    
  }); 
};

google.maps.event.addDomListener(window, 'load', initialize);

google.maps.event.addDomListener(window, "resize", resizingMap());

$('#myMapModal').on('show.bs.modal', function() {
   //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
   resizeMap();
})

function resizeMap() {
   if(typeof map =="undefined") return;
   setTimeout( function(){resizingMap();} , 400);
}

function resizingMap() {
   if(typeof map =="undefined") return;
   var center = map.getCenter();
   google.maps.event.trigger(map, "resize");
   map.setCenter(center); 
}

//END OF MAPA DEL MODAL
</script>
