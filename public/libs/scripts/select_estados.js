$(document).ready(function(){
    // Cargamos los estados
    var estados = "<option value='0' selected>Selecciona el estado</option>";
    for (var key in municipios) {
        if (municipios.hasOwnProperty(key)) {
            estados = estados + "<option value='" + key + "'>" + key + "</option>";
        }
    }
    $('#estadoAlu').html(estados);
    // Al detectar cambio en el select de estaods
    $( "#estadoAlu" ).change(function() {
        var html = "<option value='0' selected>Selecciona el municipio</option>";
        $("#estadoAlu option:selected").each(function() {
            var estado = $(this).text();
            if(estado != "Selecciona el estado"){
                var municipio = municipios[estado];
                for (var i = 0; i < municipio.length; i++)
                    html += "<option value='" + municipio[i] + "'>" + municipio[i] + "</option>";
            }
        });
        $('#municipioAlu').html(html);
    })
    .trigger( "change" );
});