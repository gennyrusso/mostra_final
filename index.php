<?php

include "includes/db.inc.php";
include "includes/checkSession.php";

if ($isLogged) {
  $sql = "SELECT * FROM visitatori WHERE email='$email' ";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $cod_v = $row['cod_visitatore'];
  $nome = $row['nome'];
  $_SESSION['cod_v'] = $cod_v;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MOSTRE</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
  <link href="css/coming-soon.css" rel="stylesheet">

</head>

<body>

  <?php
  if ($isLogged) { ?>
    <div class="overlay">
      <ul class="nav justify-content-end">
        <li class="nav-item" style="margin-right: 20px; margin-top:13px" >
          <p style="color:white">BENVENUTO/A, <?= $nome  ?> ! <a href="logout.php"> Logout</a> </p>
        </li>
      </ul>
    </div>
  <?php } ?>

  <img class="bg_image" src="img/sfondo.jpg" alt="">
  <div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12 my-auto">
          <div class="masthead-content text-white py-5 py-md-0">

            <h1 class="mb-3">Mostre</h1>
            <p class="mb-5"><strong>Benvenuto!</strong> Su Mostre On line potrai prenotare e acquistare i tuoi biglietti comodamente da casa. </p>
            <?php if (!$isLogged) { ?>
              <form action="" method="post" id="login">
              <div class="input-group input-group-newsletter">              
                <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Enter email..." aria-describedby="basic-addon">
                <p class="email error"></p>                
                <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Enter pw..." aria-describedby="basic-addon">
                <p class="password error"></p>
                <div class="input-group-append">
                  <button type="submit" name="submit-register" data-toggle="modal" data-target="#loginModal" class="btn btn-secondary" >Accedi!</button>
                  <p class="error campi"></p>
                </div>
            </form>
              </div>
            <?php } ?>
          </div>          
        </div>
      </div>
    </div>
  </div>

  <div class="social-icons">
    <ul class="list-unstyled text-center mb-0">
      <li title="Seleziona Sedi" class="button_sedi">
      <p class="button_sedi_p">Sedi</p>
        <a class="button_sedi_a" href="#">
          <i class="fas fa-theater-masks" onclick="showModalSedi()"></i>
        </a>
      </li>
      <?php if ($isLogged) { ?>
      <li title="Visualizza Prenotazioni" class="button_sedi">
      <p class="button_sedi_p">Prenotazioni</p>
        <a class="button_sedi_a" href="#">
          <i class="fas fa-shopping-cart" onclick="showModalPrenotazioni()"></i>
        </a>
      </li>
      <?php }?>
    </ul>
  </div>

  <div id="showModals"></div>
  <div id="showModals2"></div>
  <div id="showModals3"></div>
  <div id="showModals4"></div>
  <div id="showModals5"></div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
  <!-- cdnjs.com cercare jspdf per poter stampare con un pdf -->
  <!-- Custom scripts for this template -->

  <script src="js/bootstrap-datetimepicker.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>

  <script src="js/coming-soon.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/show-sedi.js"></script>
  <script src="js/show-prenotazioni.js"></script>
  <script src="js/show-mostre.js"></script>
  <script src="js/show-acquisto.js"></script>
  <script src="js/show-modifica.js"></script>
  <script src="js/login.js"></script>
  <script src="js/custom.js"></script>
  

</body>

</html>