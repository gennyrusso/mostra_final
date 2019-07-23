<?php

include "includes/db.inc.php";
include "includes/checkSession.php";

$cod_sede = $_GET['cod_sede'];

$mostre = "SELECT * FROM mostre  WHERE cod_sede = '$cod_sede'";
$result = $conn->query($mostre);

?>


<div class="modal fade modal-mostre" id="myModal" style="background: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-lg" style="max-width: 1024px;">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Mostre</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Titolo</th>
                        <th>Data Inizio</th>
                        <th>Data Fine</th>
                        <th>Prezzo</th>                        
                        <th>Acquista</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $cod_mostra = $row['cod_mostra'];
                        $titolo = $row['titolo'];
                        $data_inizio = $row['data_inizio'];
                        $data_inizio1 = date("d-m-Y", strtotime($data_inizio));
                        $data_fine = $row['data_fine'];
                        $data_fine1 = date("d-m-Y", strtotime($data_fine));
                        $prezzo = $row['prezzo'];                       
                        $cod_sede = $row['cod_sede'];

                        ?>
                        <tr>
                            <td><?= $titolo ?></td>
                            <td><?= $data_inizio1 ?></td>
                            <td><?= $data_fine1 ?></td>
                            <td><?= $prezzo ?></td> 
                            <?php
                             if($isLogged){ ?>                             
                                <td><button class="btn_acquista" onclick="showModalAcquisto('<?= $cod_mostra ?>')">Acquista</button></td>
                            <?php }else{?>
                            <td><p>Per prenotare <a href="index.php"> Accedi</a> </p></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>


        </div>
    </div>
</div>