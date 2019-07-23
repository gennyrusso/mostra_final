<?php

include "includes/db.inc.php";
include "includes/checkSession.php";

$cod_vis = $_SESSION['cod_v'];

$prenotazioni = "SELECT b.cod_operazione, m.titolo, b.data,b.fascia_oraria, m.prezzo, b.tipo_pagamento, s.nome, b.quantita
from biglietti b
inner join mostre m on b.cod_mostra = m.cod_mostra inner join sedi s on m.cod_sede=s.cod_sede WHERE cod_visitatore = '$cod_vis'";
$result = $conn->query($prenotazioni);

?>


<!-- The Modal -->
<div class="modal fade modal-prenotazioni" id="myModal">
  <div class="modal-dialog modal-lg" style="max-width: 1024px;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Le tue Prenotazioni -  <?= $nome  ?> <?= $cognome  ?> </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <table class="table">
                <thead>
                    <tr>
                        <th>Titolo</th>
                        <th>Data </th>
                        <th>Fascia Oraria</th>
                        <th>Prezzo</th>
                        <th>Tipo Pagamento</th>
                        <th>Sede</th>
                        <th>Quantità</th>                                             
                        <th>Modifica</th>                                             
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $cod_operazione = $row['cod_operazione'];
                        $titolo = $row['titolo'];
                        $data = $row['data'];
                        $data1 = date("d-m-Y", strtotime($data));
                        $fascia_oraria = $row['fascia_oraria'];
                        $prezzo = $row['prezzo'];
                        $tipo_pagamento = $row['tipo_pagamento'];
                        $sede = $row['nome'];
                        $quantita = $row['quantita'];                                               
                        

                        ?>

                   <?php $fasce = ['', '10-12', '12-14', '14-16', '16-18', '18-20']; ?>
                        <tr>
                            <td><?= $titolo ?></td>
                            <td><?= $data1 ?></td>
                            <td><?= $fasce[$fascia_oraria] ?></td>
                            <td><?= $prezzo ?></td> 
                            <td><?= $tipo_pagamento ?></td> 
                            <td><?= $sede ?></td> 
                            <td><?= $quantita ?></td> 
                            <td><button class="btn_acquista" onclick="showModalModifica('<?= $cod_operazione ?>')">Modifica Quantità</button></td>                           
                                                       
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
</div>