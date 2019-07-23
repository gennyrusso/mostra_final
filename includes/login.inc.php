<?php
require 'db.inc.php';

header('Content-Type: application/json');

$risposta = [
    'error' => false,
    'success' => false
    // 'query' => $sql
];

$email_ = $_POST['email'];
$password = $_POST['password'];

if (empty($email_) || empty($password)) {
    $risposta['error'] = 200;
} else {



    $sql = "SELECT * FROM visitatori WHERE email='$email_'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $cod_v = $row['cod_visitatore'];
    $nome = $row['nome'];
    $cognome = $row['cognome'];
    $telefono = $row['telefono'];
    $email = $row['email'];
    $isPresent = count($row);

    if ($isPresent == 0) {
        $risposta['error'] = 202;
    } else {
        if ($password === $row['psw']) {
            setSession($cod_v, $nome, $cognome, $email);
            $risposta['success'] = true;
        } else {
            $risposta['error'] = 203;
        }
    }
}



function setSession($cod_v, $nome, $cognome, $email)
{
    session_start();
    $_SESSION['cod_v'] = $cod_v;
    $_SESSION['nome'] = $nome;
    $_SESSION['cognome'] = $cognome;
    $_SESSION['email'] = $email;
}

echo json_encode($risposta);