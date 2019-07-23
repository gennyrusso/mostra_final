<?php

include "includes/db.inc.php"; ?>

<!-- The Modal -->
<div class="modal fade modal-sedi" id="myModal" style="overflow-y:scroll">
  <div class="modal-dialog modal-lg" style="max-width: 1024px;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Sedi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="card_sedi_box">


          <?php
          $sedi = "SELECT * FROM sedi";
          $result = $conn->query($sedi);
          while ($row = $result->fetch_assoc()) {
            ?>

<div class="card" style="width: 18rem;margin:10px;cursor:pointer;" onclick="showModalElencoMostre('<?= $row['cod_sede'] ?>')">
  <img class="card-img-top" src="img/<?=$row['img'] ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?= $row['nome'] ?></h5>
    <p><?= $row['indirizzo'] ?></p>
                <p><?= $row['citta'] ?> Tel:<?= $row['telefono'] ?></p>
                <p>Capienza: <?= $row['capienza'] ?></p>
  </div>
</div>


          <?php
          }
          ?>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>


    </div>
  </div>
</div>