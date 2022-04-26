// Call the dataTables jQuery plugin
$(document).ready(function() {

  var miTabla = $('#dataTable').DataTable({
    language: {
      "decimal": "",
      "emptyTable": "No hay información",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
      "infoFiltered": "(Filtrado de un total de _MAX_ entradas)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ Registros",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "Sin resultados encontrados",
      "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
    },
  });

  $('#dataTable tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('selected') ) {
        $(this).removeClass('selected');

        $('#btnHist').prop( "disabled", true );
        $('#btnDatos').prop( "disabled", true );
        $('#btnDatosT').prop( "disabled", true );

        $('#btnHistGrup').prop( "disabled", true );
        $('#btnModifGrup').prop( "disabled", true );
    }
    else {
        miTabla.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        $('#btnHist').prop( "disabled", false );
        $('#btnDatos').prop( "disabled", false );
        $('#btnDatosT').prop( "disabled", false );

        $('#btnHistGrup').prop( "disabled", false );
        $('#btnModifGrup').prop( "disabled", false );
    }
  });

  

});
