$(document).ready(function()
  {
    $.post("../PHP/revisasesion.php",{},function(respuesta){

           if(respuesta=="2"){
              alert("Debe iniciar sesión");
              location.href="../index.html";
           }
  });
    $.ajax({
      url: "../PHP/vercuestionariodetallado.php", 
      type: "POST", 
      dataType: "json", 
      success: function(data)
      { 
        $.each(data, function(k,v)
        {
          $("#1").html(v.idcuestionario);
          $("#2").html(v.nombre);
          $("#3").html(v.fecha);
          $("#nombre").val(v.nombre);
        });
      },
      error: function(error)
      {
        console.log(error);
        alert(error);
      }
    });
    $.ajax({
      url: "../PHP/vernumerodepreguntas.php", 
      type: "POST", 
      dataType: "json", 
      success: function(data)
      { 
        $.each(data, function(k,v)
        {
          $("#nodepreguntas").text(v.nodepreguntas);
        });
      },
      error: function(error)
      {
        console.log(error);
        alert(error);
      }
    });
    $("#elimina").click(function()
	{
		$.mobile.changePage("#confirmar",'pop',true,true);
	});
	$("#eliminar").click(function()
	{
		$.post("../PHP/eliminacuestionario.php",function(respuesta){
            if (respuesta == 1) {
                $.mobile.changePage('#pageExito', 'pop', true, true);
                location.href="main.html";
            }
           else{
           		$.mobile.changePage('#pageError', 'pop', true, true);
           		location.href="main.html";
           }
        });
	});
	$("#editar").click(function()
	{
		var nombre=$("#nombre").val();
		if (nombre=="")
		{
			$.mobile.changePage('#pageLlenar', 'pop', true, true);
			return null;
		}
        $.post("../PHP/editacuestionario.php",{nombre:nombre},function(respuesta){
            if (respuesta == "1") {
                alert("Actualización exitosa");
                location.href="verinfocuestionario.html";
            }
            else if (respuesta=="2")
            {
            	$.mobile.changePage('#pageError', 'pop', true, true);
            	return null;
            }
            else{
              alert(respuesta);
            }
        });
	});
  });
  function revisarprivilegio(){
    $.post("../PHP/revisaprivilegio.php",{},function(respuesta){
      if(respuesta==0)
      {
        alert("Usted no dispone de los permisos necesarios");
        return null;
      }
      else {
        $.mobile.changePage('#pageEditaCuestionario', 'pop', true, true);
            	return null;
      }
  });
  }	 