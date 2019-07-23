<?php
// session_start();
header('Content-Type: application/json');
include "../includes/db.inc.php";



 $cod_operazione = $_POST['cod_operazione'];
 $fascia_oraria = $_POST['fascia_oraria']; 
 $data = $_POST['data'];
 $quantita = $_POST['seleziona-quantita'];
 $cod_mostra = $_POST['cod_mostra']; 


$risposta = [
    'seleziona-quantita' => $quantita,  
    'fascia_oraria' => $fascia_oraria,
    'data' => $data,
    'cod_mostra' => $cod_mostra,
];



$sql="UPDATE `biglietti` SET `quantita`='$quantita' WHERE cod_operazione= $cod_operazione ";

if ($result=$conn->query($sql)) {
    $risposta['success'] = true;
} else {
    $risposta['success'] = false;
}

echo json_encode($risposta);

mysqli_close($conn);
