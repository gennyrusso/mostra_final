
$("#login").on("submit", login);

function login(e) {
  e.preventDefault();
  var data_form = $("#login").serialize();
  cancellaCampi(false);
  $.ajax({
    type: "POST",
    url: "includes/login.inc.php",
    data: data_form,

    success: function(risposta) {
      if (risposta.success) {
        Swal.fire({
          type: "success",
          title: "Benvenuto!",
          showConfirmButton: false,
          timer: 1500
        });
        setTimeout(function() {
          location.href = "index.php";
        }, 2000);
      } else {
        if (risposta.error == 200) {
          $(".campi-error").html("Compila i campi");
        } else if (risposta.error == 202) {
          $(".email-error").html("Utente non presente");
        } else if (risposta.error == 203) {
          $(".password-error").html("Password Sbagliata");
        } else {
        }
      }
    }
  });
}

function cancellaCampi(cancella) {
  $(".campi-error").html("");
  $(".email-error").html("");
  $(".password-error").html("");
  if (cancella) {
    $("#login").trigger("reset");
  }
}