$(document).ready(function() {
    //Limpiar form de registro grupo (registroGrup)
    $("#limpiarButtonGrup").click(function(){
        $("#formRegGrup").trigger("reset");
    });

    //Limpiar form de registro alumno (registroAlu)
    $("#limpiarButtonAlu").click(function(){
        $("#formRegAlu").trigger("reset");
    });

    
});
  