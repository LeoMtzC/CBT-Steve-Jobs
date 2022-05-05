$(document).ready(function() {
 
    var miTabla = $('#dataTable').DataTable();
    //Lógica de botones
    $('#dataTable tbody').on( 'click', 'tr', function () {
      if ( $(this).hasClass('selected') ) {
          $(this).removeClass('selected');

          $('#docVisualizer').attr("hidden",true);

          $('#btnsHistGrup').attr("hidden",true);
  
          $('#btnsDetallesAlu').attr("hidden",true);

          $('#btnsPOHistGrup').attr("hidden",true);
          $('#btnsPOHistAlu').attr("hidden",true);

          $('#btnsPEHistGrup').attr("hidden",true);
          $('#btnsPEHistAlu').attr("hidden",true);

          $('#btnsSSHistGrup').attr("hidden",true);
          $('#btnsSSHistAlu').attr("hidden",true);

          $('#btnsEPHistGrup').attr("hidden",true);
          $('#btnsEPHistAlu').attr("hidden",true);
      }
      else {
          miTabla.$('tr.selected').removeClass('selected');
          $(this).addClass('selected');

          $('#docVisualizer').removeAttr('hidden');

          $('#btnsHistGrup').removeAttr('hidden');
  
          $('#btnsDetallesAlu').removeAttr('hidden');

          $('#btnsPOHistGrup').removeAttr('hidden');
          $('#btnsPOHistAlu').removeAttr('hidden');

          $('#btnsPEHistGrup').removeAttr('hidden');
          $('#btnsPEHistAlu').removeAttr('hidden');

          $('#btnsSSHistGrup').removeAttr('hidden');
          $('#btnsSSHistAlu').removeAttr('hidden');

          $('#btnsEPHistGrup').removeAttr('hidden');
          $('#btnsEPHistAlu').removeAttr('hidden');
      }
    });
  
});
  