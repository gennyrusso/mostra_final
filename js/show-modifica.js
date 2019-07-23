function showModalModifica(cod_operazione) {
    $.ajax({
      type: "POST",
      url: "modal-modifica.php?cod_operazione=" + cod_operazione,
      data: {},
      success: function(data) {
        $("#showModals5").html(data);
        $(".modal-modifica").modal("show");  
         $("#modificaBiglietti").on("submit", confermaQuantita);      
      }
    });
  }

  function confermaQuantita(e) {
  var formdata = $("#modificaBiglietti").serialize(); 
  e.preventDefault(); 
  $.ajax({
    type: "POST",
    url: "includes/modifica_biglietto.inc.php",
    data: formdata,
    success: function(data) {
      if (data.success) {
        Swal.fire({
          type: "success",
          title: "Modifica avvenuta con successo!",
          showConfirmButton: false,
          timer: 1500
        });
        $(".modal-modifica").modal("hide");
        
      } else {
        swal("errore", " errore", "error");
      }
    }
  });
}
