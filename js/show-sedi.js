function showModalSedi() {
    $.ajax({
        type: "POST",
         url: "modal-sedi.php",
        data: {
            
        },
        success: function (data) {
            $("#showModals").html(data);
            $(".modal-sedi").modal("show");
            
        }
    });
}