<?php

include "includes/db.inc.php";

$cod_mostra = $_GET['cod_mostra'];

$mostre = "SELECT * FROM mostre WHERE cod_mostra = '$cod_mostra'";
$result = $conn->query($mostre);

$row = $result->fetch_assoc();
$cod_mostra = $row['cod_mostra'];
$titolo = $row['titolo'];
$data_inizio = $row['data_inizio'];
$data_inizio1 = date("d-m-Y", strtotime($data_inizio));
$data_fine = $row['data_fine'];
$data_fine1 = date("d-m-Y", strtotime($data_fine));
?>


<!-- The Modal -->
<div class="modal fade modal-acquisto" id="myModal" style="background: rgba(0, 0, 0, 0.7);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Prenota Biglietto</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">               
          
                <h6><?= $titolo ?></h6>
                <p>Disponibile dal <?= $data_inizio1 ?> <strong>al</strong> <?= $data_fine1 ?> </p>
                
                <form class="form" method="post" action="includes/inserisci_biglietto.inc.php" id="acquistoBiglietti">
                <div class="form-group">
                  
                    <input size="16" type="text" name="seleziona-data" placeholder="Inserisci data" readonly class="form_datetime">
                </div>

                    <div style="margin-bottom: 10px!important;">
                        <input id="cod_mostra" type="hidden" name="cod_mostra" value="<?= $cod_mostra ?>">

                        <div>
                        <select name="fasciaoraria" id="fasciaoraria" onchange="controlloFascia(this)" class="custom-select form-control biglietti-form">
                            <option value="0" selected disabled>Seleziona fascia oraria</option>
                            <option value="1">10.00 - 12.00</option>
                            <option value="2">12.00 - 14.00</option>
                            <option value="3">14.00 - 16.00</option>
                            <option value="4">16.00 - 18.00</option>
                            <option value="5">18.00 - 20.00</option>                            
                        </select>
                    </div>

                    <div>
                        <select name="tipoPagamento" id="tipoPagamento"  class="custom-select form-control ">
                            <option value="0" selected>Seleziona il tipo di pagamento</option>
                            <option value="Carta di Credito">Carta di Credito</option>
                            <option value="Bonifico">Bonifico</option>
                            <option value="Paypal">Paypal</option>
                            <option value="Contanti">Contanti</option>
                        </select>
                    </div>
                    <div>
                        <select disabled name="numbiglietti" id="numbiglietti" onchange="controlloQuantita(this)" class="custom-select form-control biglietti-form">
                            <option value="0" selected disabled>Seleziona il numero di biglietti</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>


                    <div id="showQuantitaDiPosti"></div>
                    <div id="showMsgError"></div>

                    <div class="modal-footer">
                        <input disabled type="submit" id="acquista-submit" name="acquista-submit" class="btn btn-success" value="Prenota">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>



        </div>
    </div>
</div>
</div>

<script>
    $(".form_datetime").datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,        
        startDate: "<?= $data_inizio ?>",
        endDate:'<?= $data_fine ?>',
        minuteStep:0,
        minView:1,
           
    });
</script>

