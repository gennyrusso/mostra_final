<?php
session_start();

$isLogged = false;

if (isset($_SESSION['cod_v'])) {
    $isLogged = true;
    $cod_v = $_SESSION['cod_v'];
    $nome = $_SESSION['nome'];
    $cognome = $_SESSION['cognome'];
    $email = $_SESSION['email'];
}