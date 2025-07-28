$(document).ready(function(){
    $.post("../PHP/revisasesion.php",{},function(respuesta){
           if(respuesta=="2"){
              alert("Debe iniciar sesión");
              location.href="../index.html";
           }
  });
  $.post("../PHP/obtenerdatossesion.php",{},function(respuesta){
    $("#bannernombre").text("Usuario en sesión: "+respuesta);
  })
    $("#logout").click(function()
    {
        $.post("../PHP/cierrasesion.php",{},function(respuesta){
            if (respuesta==1){
                location.href="../index.html";
            }
            else{
                location.href="../index.html";
            }
        })
    });
    $("#agregarcuestionario").click(function()
    {
        $.mobile.changePage('#pageRegistraCuestionario','pop',true,true);
        return null;
    });
    $("#terminacuestionario").click(function()
    {
        alert("El cuestionario ha sido registrado con éxito");
        location.href="main.html";
    });
    $("#vercuestionarios").click(function()
    {
        $("#consultadecuestionarios").empty();
        $.ajax({
      url: "../PHP/vercuestionarios.php", 
      type: "POST", 
      dataType: "json", 
      success: function(data)
      { 
        $.each(data, function(k,v)
        { 
          $("#consultadecuestionarios").append( 
            $('<li>').append(
              $('<a>').html(v.nombre).attr("onclick","verinfocuestionario("+v.idcuestionario+");").addClass("ui-btn ui-btn-icon-right ui-icon-carat-r").append(
              $('<p>').html("Creado el: "+v.fecha_creacion)
              )   
            )
          );
        });
        
      },
      error: function(error)
      {
        alert(error, 2);
      }
    });
        $.mobile.changePage('#pageConsultaCuestionarios', 'pop', true, true);
        return null;
    });
    $("#change").click(function()
  {
    var contraoriginal=$("#contraoriginal").val();
    var contranueva=$("#contranueva").val();
    var contrarepite=$("#contrarepite").val();
    if(contraoriginal==""||contranueva==""||contrarepite=="")
    {
      $.mobile.changePage('#pageLlenar','pop',true,true);
      return null;
    }
    if(contranueva!=contrarepite)
    {
      $.mobile.changePage('#pageContranoigual','pop',true,true);
      borrarcamposcontrados();
      return null;
    }
    if (contraoriginal==contranueva||contraoriginal==contrarepite)
    {
      $.mobile.changePage('#pageContraIgual','pop',true,true);
      borrarcamposcontra();
      return null;
    }
    $.post("../PHP/cambiacontra.php",{contraoriginal:contraoriginal, contranueva:contranueva},function(respuesta){
            if (respuesta == 2) {
                $.mobile.changePage('#pageContranooriginal','pop',true,true);
            }
           else{
              location.href="../index.html";
           }
  });
function borrarcamposcontra()
{
    $("#contraoriginal").val("");
    $("#contranueva").val("");
    $("#contrarepite").val("");
}
function borrarcamposcontrados()
{
    $("#contranueva").val("");
    $("#contrarepite").val("");
}
  });
  $("#registrarespuesta").click(function()
    {
        let respuesta = $("#respuesta").val();
        let esCorrecta = $("#respuestacorrecta").val();
    if(respuesta=="")
        {
            alert("Favor de escribir una respuesta");
            return null;
        }
    $.post("../PHP/registrarespuesta.php",{ respuesta : respuesta, esCorrecta : esCorrecta},function(respuesta){
            if (respuesta == 2) {
                $.mobile.changePage('#pageError', 'pop', true, true);
            }
            if (respuesta == 1){
                $("#cuestionario").val("");
                $.mobile.changePage('#pageExito', 'pop', true, true);
            }
        });
    });
  $("#registrapregunta").click(function()
    {
        let pregunta = $("#pregunta").val();
        let respuestacorrecta = $("#respuestacorrecta").val();
        let respuesta1 = $("#respuesta1").val();
        let respuesta2 = $("#respuesta2").val();
        let respuesta3 = $("#respuesta3").val();
        let respuesta4 = $("#respuesta4").val();

        if(pregunta=="")
        {
            alert("Favor de escribir una pregunta");
            return null;
        }
        if(respuesta1=="")
        {
          alert("La respuesta 1 es obligatoria");
          return null;
        }
        if(respuesta2=="")
        {
          alert("La respuesta 2 es obligatoria");
          return null;
        }

        $.post("../PHP/registrapregunta.php",{ pregunta : pregunta},function(respuesta){
          if (respuesta == 2) {
              $.mobile.changePage('#pageError', 'pop', true, true);
          }
          if (respuesta == 1){
            respuesta == 0;
              $.post("../PHP/registrarespuesta.php",{ respuesta1 : respuesta1, respuesta2 : respuesta2, respuesta3 : respuesta3, respuesta4 : respuesta4, respuestacorrecta : respuestacorrecta},function(respuesta){
                if (respuesta == 2) {
                    $.mobile.changePage('#pageError', 'pop', true, true);
                }
                if (respuesta == 1 || respuesta == 11 || respuesta == 111){
                    alert("Respuesta registrada con éxito");
                    $("#pregunta").val("");
                    $("#respuesta1").val("");
                    $("#respuesta2").val("");
                    $("#respuesta3").val("");
                    $("#respuesta4").val("");
                }
            });
          }
      });
  });

        


    
  $("#registracuestionario").click(function()
    {
        let nombre = $("#cuestionario").val();
    if(nombre=="")
        {
            alert("Favor de nombrar el cuestionario");
            return null;
        }
    $.post("../PHP/registracuestionario.php",{ nombre : nombre},function(respuesta){
            if (respuesta == 2) {
                $.mobile.changePage('#pageError', 'pop', true, true);
            }
            if (respuesta == 1){
                alert("El cuestionario ha sido creado");
                $.mobile.changePage('#pageRegistraPregunta', 'pop', true, true);
            }
        });
    });
});

function verinfocuestionario(id)
{
    $.post("../PHP/guardavariablesesion.php",{id:id},function(respuesta){
         location.href="verinfocuestionario.html";
        });
}
