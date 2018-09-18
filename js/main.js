$("form.prediction-form").on('submit',function() {
  /*----??????-------
  VERIFICAR CARACTERES ESPECIALES
  /---------------------------------*/


  //action y method definidos en el form (index)
  var that =$(this), //this = form
    url=that.attr('action'),
    type=that.attr('method'),
    data={};
  that.find('[name]').each(function(index,value){ //campos que tengan el atributo 'name'
      var that=$(this),
        key_name=that.attr('name'),//nombre del atributo
        value=that.val().toLowerCase(); //valor del atributo (convertido en minuscula)
        data[key_name]=value; //array asociativo k-v

  });
  //console.log(data);

  //envio de datos al servidor
  $.ajax({
    url:url,
    type:type,
    data:data,
    success: function(response){//respuesta del servidor
      var rec_datos = JSON.parse(response);
      //console.log(rec_datos);
      $("#num-nombre2").html("<b>"+data.mid_name.toUpperCase()+": </b>"+rec_datos.Nombre2);
      $("#num-nombre1").html("<b>"+data.first_name.toUpperCase()+": </b>"+rec_datos.Nombre1);
      $("#num-apellido1").html("<b>"+data.apellido1.toUpperCase()+": </b>"+rec_datos.Apellido1);
      $("#num-apellido2").html("<b>"+data.apellido2.toUpperCase()+": </b>"+rec_datos.Apellido2);
      $("#num-nombreCompleto").html("<b>NOMBRE COMPLETO: </b>"+rec_datos.NombreCompleto);

    }
  });

  return false;


});
