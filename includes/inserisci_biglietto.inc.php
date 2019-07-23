<?php
session_start();
include "../includes/db.inc.php";

header('Content-Type: application/json');


 $cod_mostra = $_POST['cod_mostra'];
 $data_ora = $_POST['seleziona-data'];
 $data_ora= explode(' ', $data_ora);
 $data= $data_ora[0];
 $ora=$_POST['fasciaoraria'];
 $tipo_pagamento = $_POST['tipoPagamento'];
 $quantita = $_POST['numbiglietti'];
 $cod_vis = $_SESSION['cod_v'];
 
 


$risposta = [
    'seleziona-data' => $data,  
    'fasciaoraria' => $ora,  
    'tipoPagamento' => $tipo_pagamento,
    'numbiglietti' => $quantita,
    'cod_mostra' => $cod_mostra,
];



$sql="INSERT INTO biglietti (cod_visitatore, fascia_oraria, data, tipo_pagamento, quantita, cod_mostra) VALUES ('$cod_vis', '$ora', '$data','$tipo_pagamento','$quantita','$cod_mostra')";

if ($result=$conn->query($sql)) {
    $risposta['success'] = true;
} else {
    $risposta['success'] = false;
}

echo json_encode($risposta);

mysqli_close($conn);
