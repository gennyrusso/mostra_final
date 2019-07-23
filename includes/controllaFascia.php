<?php

require 'db.inc.php';

$fascia = $_POST['fascia_or'];
$cod_mostra = $_POST['cod_mostra'];


 $sql = "SELECT s.capienza, SUM(bg.quantita) as totale  FROM sedi s
            LEFT JOIN mostre m ON s.cod_sede=m.cod_sede
            LEFT JOIN biglietti bg ON m.cod_mostra=bg.cod_mostra
            WHERE m.cod_mostra='$cod_mostra'
             ";

//  query senza condizione  fascia_orario: capienza
$resMassimo = $conn->query($sql);

// query con condizione  fascia_orario: ho capacita solo se c'e quantita
$resQuantita = $conn->query($sql . " And bg.fascia_oraria='$fascia'");


$rowMassimo = $resMassimo->fetch_assoc();
$rowQuantita = $resQuantita->fetch_assoc();

$massimo = $rowMassimo['capienza'];

$disponibile = $rowQuantita['capienza'] - $rowQuantita['totale'];


// questo perche se $rowQuantita['quantita'] è > di massimo poi $disponibile diventa negativo, quindi se è  negativo mettiamo 0
if($disponibile<0){
    $disponibile = '0';
}


?>
<div class="alert alert-warning mt-2">    
    <strong>
        <span id="postiDisp"><?= (empty($disponibile)) ? $massimo : $disponibile ?></span> Prenotazioni ancora disponibili
    </strong>
</div>