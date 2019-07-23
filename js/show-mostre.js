function showModalElencoMostre(cod_sede) {         
    $.ajax({
        type: "POST",
        url: "modal-mostre.php?cod_sede=" +cod_sede,
        data: {
            
        },
        success: function(data){
            $('#showModals2').html(data)
            $(".modal-mostre").modal("show"); 
           

        }

    })
     
}