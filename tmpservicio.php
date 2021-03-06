<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="app\Templates\css\estilos.css">
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script> 


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
				<a id="titulo" href="http://eontzia.zubirimanteoweb.com/">
					<img class="logo" src="img/logo_sin.png">
					<span class="site-name">E-ontziApp</span>
					<span class="site-desc">Web de E-ontzia.</span>
				</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">			
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido'] ?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#"><span class="showopacity glyphicon glyphicon-user"></span> Perfil</a></li>
							<li><a href="logout"><span class="showopacity glyphicon glyphicon-off"></span> Cerrar sesi&oacute;n</a></li>                  
						</ul>
					</li>     
				</ul>
			</div><!-- /.navbar-collapse -->
  		</div><!-- /.container-->
	</nav>

	
	<!--Contenido-->
	<div id="cont-fluid" class="container-fluid">
		<div id="dispos" class="col-xs-12 col-md-12 col-lg-12">
			
			<!-- Zakładki -->
<ul class="nav nav-tabs" role="tablist" color="red">
  <li class="active"><a href="#1zakladka" role="tab" data-toggle="tab">Añadir Dispositivo</a></li>
  <li><a href="#2zakladka" role="tab" data-toggle="tab">Añadir Trabajador</a></li>
  <li><a href="#3zakladka" role="tab" data-toggle="tab">Modificar Dispositivo</a></li>

</ul>

<!-- Zawartość zakładek -->
<div class="tab-content">
<!-- Zawartość zakładki 1 -->
		  <div class="tab-pane active" id="1zakladka"  class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6 ">
		  		  <form action="anadirDispositivo" method="post" id="anadirDispositivo">
		        <div class="form-group" >
		            <label  class="col-xs-2">TIPO</label>
		            <select id="tiposelect"class="form-control">
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
		        </div>
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
		  <div class="tab-pane" id="2zakladka">
		  		  <form  action="anadirTrabajador"  method="post" id="anadirTrabajador" >
		  		  <div class="form-group">
			        <div class="input-group">
			            <label  class="col-xs-2">Nombre</label>
			            <input type="text"  required="required" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
			        </div>
			       </div>
			       <div class="form-group">
			        <div class="input-group">
			            <label for="inputApellido" class="col-xs-2">Apellido</label>
			            <input type="text"  required="required" class="form-control" id="inputApellido" name="inputApellido" placeholder="Apellido">
			        </div>
			        </div>
			        <div class="form-group">
			        <div class="input-group">
			            <label  class="col-xs-2">Telefono</label>
			            <input type="text" class="form-control"  name="Telefono" placeholder="Telefono">
			        </div>
			        </div>
			        <div class="form-group">
			        <div class="input-group">
			            <label  class="col-xs-2">Email</label>
			            <input type="text" class="form-control" id="inputEmail" name="Email" placeholder="Email">
			        </div>
			        </div>
			        <div class="input-group">
			             <label  class="col-xs-2">Perfil</label>
		            <select class="form-control" class="selectpicker">
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
		  <div class="tab-pane" id="3zakladka">
		  		  <form  action="modyficarDispositivos"  method="post" id="modyficarDispositivos" >
		  		  
			       <div class="container">
					  <h2>Lista de los Dispositivos</h2>
					  <div class="list-group">
					  	  <script>
					  $.ajax({
								type:"GET",
								//url:"http://localhost:8080/eontziApp/app/getAllPos",	
								//url:"http://eontzia.zubirimanteoweb.com/app/getAllPos",
								url:"http://localhost/Aitor/classes/chris_residuos/eontzia_/new_eontzia/eontzia/app/getAllPos/?id=1",
								dataType:"JSON",
								data:"",
								success:function(data){
									console.log(data);
									if(data.estado=="OK"){
											 <?php
										  /*  $json=file_get_contents('http://eontzia.zubirimanteoweb.com/app/getAllPos');
										    $array=json_decode($json,true);
								 foreach (data['mensaje'] as  $value) {
								        	?><a id="<?php echo $value['Dispositivo_Id'];?>" class="list-group-item ">
								        <h4 class="list-group-item-heading"> </h4>
								        <p class="list-group-item-text"> El Volumen actual es : <?php echo $value['Volumen'];?> %  </p>
										    </a>
								        <?php } */?>
								        $.each(data.mensaje,function(i,item){
											
									})
										   
									}
								},
								beforeSend:function(){

								},
								complete:function(){

								},
								error:function(){

								}
							});
						
						</script>
					  	  </div>
						</div>
			        <div id="errorbox" style="color:red"></div>
			       <!-- <input id="btn" type="submit" value="ENVIAR"/>         -->
			         <!-- <button id="btnmodyficarDispositivos" type="submit" class="btn btn-primary">Modificar</button> -->
			    </form>
			    				<!-- Modal -->
							<div id="myModal" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">Datos del Dispositivo</h4>
							      </div>
							      <div class="modal-body">
							           <div class="form-group">
								        <div class="input-group">
								            <label  class="col-xs-2">Latitude</label>
								            <input  type="text" class="form-control" id="inputLatitude" name="inputLatitude" placeholder="Latitude">
								        </div>
								        </div>
								        <div class="form-group">
								        <div class="input-group">
								            <label  class="col-xs-2">Longitude</label>
								            <input  type="text" class="form-control" id="inputLongitude" name="inputLongitude" placeholder="Longitude">
								        </div>
								    	</div>
								        <div class="form-group">
								        <div class="input-group">
								            <label  class="col-xs-2">Activo</label>
								            <input type="text" class="form-control"  name="Activo" placeholder="Activo">
								        </div>
								        </div>
								        <div class="form-group">
								        <div class="input-group">
								            <label  class="col-xs-2">Tipo</label>
								            <input type="text" class="form-control" id="Tipo" name="Tipo" placeholder="Tipo">
								        </div>
								        </div>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button id="btnmodyficarDispositivos" type="submit" class="btn btn-primary">Modificar</button>
							      </div>
							    </div>

							  </div>
							</div>
 		  </div>
 </div>	
</div>
</div>
	
</body>
</html>
<script type="text/javascript">
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
  //show modal on click from list :)
 /* $('.list-group').click(function(){
  	$('#myModal').modal('show');  	 
  });*/
  $(".list-group a").not('.emptyMessage').click(function() {
       alert('Dispositivo con ID ' + this.id);
       $('#inputLatitude').val(chris.text());
       $('#myModal').modal('show');
}); 

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

var reglasDispositivo={
	inputLatitude:{required:true,digits:true},
	inputLongitude:{required:true,digits:true},
}
var mensajesDispositivo={
	inputLatitude:{required:"Lotitude obligatoria",digits:"aceptados solo numeros"},
	inputLongitude:{required:"Longitude obligatoria",digits:"aceptados solo numeros"},
}
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

</script>