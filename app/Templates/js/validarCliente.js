
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
  $(".list-group ").click(function() {
       alert('Dispositivo con ID ' + this.id);
       //for(i=0;i>myData.lenght;i++){
       //console.log(myData[i]);
   // }
      // $.each(myData, function(kk,vv) {
       // $('.modal-body #inputLatitude').val(vv['Dispositivo_Id']);
      // });
       
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

