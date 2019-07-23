function showModalAcquisto(cod_mostra) {
  $.ajax({
    type: "POST",
    url: "modal-acquisto.php?cod_mostra=" + cod_mostra,
    data: {},
    success: function(data) {
      $("#showModals3").html(data);
      $(".modal-acquisto").modal("show");
      $("#acquistoBiglietti").on("submit", confermaBiglietto);
    }
  });
}

function confermaBiglietto(e) {
  var formdata = $("#acquistoBiglietti").serialize();
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: "includes/inserisci_biglietto.inc.php",
    data: formdata,
    success: function(data) {
      if (data.success) {
        Swal.fire({
          type: "success",
          title: "Prenotazione avvenuta con successo!",
          showConfirmButton: false,
          text: "Vai alle tue prenotazioni"
        });
        setTimeout(function() {
          location.href = "index.php";
        }, 3000);

        $(".modal-acquisto").modal("hide");
      } else {
        swal("errore", " errore", "error");
      }
    }
  });
}

function controlloFascia(el) {
  var codMostra = $("#cod_mostra").val();

  $.ajax({
    type: "POST",
    url: "includes/controllaFascia.php",
    data: {
      cod_mostra: codMostra,
      fascia_or: el.value
    },
    success: function(data) {
      $("#showQuantitaDiPosti")
        .hide()
        .html(data)
        .slideDown("slow");

      $("#numbiglietti").removeAttr("disabled");
    }
  });
}

function controlloQuantita(el) {
  var postiDisp = parseInt($("#postiDisp").html());

  var input = el.value;

  var msgError = '<div class="alert alert-danger">Capienza max raggiunta</div>';

  if (input < postiDisp) {
    $("#acquista-submit").removeAttr("disabled");
  } else {

    $("#showMsgError")
      .hide()
      .html(msgError)
      .slideDown("slow");
  }
}
