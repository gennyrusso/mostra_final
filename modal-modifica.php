<?php

include "includes/db.inc.php";

$cod_operazione = $_GET['cod_operazione'];

$biglietto = "SELECT * from biglietti b  WHERE cod_operazione = '$cod_operazione'";
$result = $conn->query($biglietto);

$row = $result->fetch_assoc();

$cod_operazione = $row['cod_operazione'];
$fascia_oraria = $row['fascia_oraria'];
$data = $row['data'];
$quantita = $row['quantita'];
$cod_mostra = $row['cod_mostra'];

?>


<!-- The Modal -->
<div class="modal fade modal-modifica" id="myModal" style="background: rgba(0, 0, 0, 0.7);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modifica quantità</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                <form class="form" method="post" action="includes/modifica_biglietto.inc.php" id="modificaBiglietti">

            <!-- Modal body -->
            <div class="modal-body"> 
                      
                <!-- <h6><?= $cod_operazione ?></h6>  -->
                <input type="hidden" name="cod_operazione" value="<?= $cod_operazione ?>">
                <!-- <h6><?= $fascia_oraria ?></h6>    -->
                <input type="hidden" name="fascia_oraria" value="<?= $fascia_oraria ?>">             
                <!-- <h6><?= $data ?></h6>                 -->
                <input type="hidden" name="data" value="<?= $data ?>">
                <!-- <h6><?= $quantita ?></h6>                 -->
                <input type="hidden" name="seleziona" value="<?= $quantita ?>">
                <!-- <h6><?= $cod_mostra ?></h6>                 -->
                <input type="hidden" name="cod_mostra" value="<?= $cod_mostra ?>">
                <h5></h5>
               
                <input size="16" type="text" name="seleziona-quantita" placeholder="Aggiorna quantità" >

                    <div class="modal-footer">
                        <input type="submit" id="modifica-submit" name="acquista-submit" class="btn btn-success" value="Modifica">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>



        </div>
    </div>
</div>
</div>

