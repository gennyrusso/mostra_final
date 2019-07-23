function showModalPrenotazioni() {
    $.ajax({
        type: "POST",
         url: "modal-prenotazioni.php",
        data: {
            
        },
        success: function (data) {
            $("#showModals2").html(data);
            $(".modal-prenotazioni").modal("show");           
        }
    });
}