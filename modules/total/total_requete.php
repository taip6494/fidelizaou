<?php

$id = $_SESSION['sess_user_id'];

$query = "SELECT SUM(Nb_point) AS TOTAL FROM historique_achat WHERE idUtilisateur = :idUtilisateur";
$stmt = $db->prepare($query);
      $stmt->bindParam('idUtilisateur', $id, PDO::PARAM_STR);
      $stmt->execute();
// get total rows
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total = $row['TOTAL'];
// echo $total;
$card = '<div class="col-xl-3 col-lg-6">
<div class="card l-bg-orange-dark">
    <div class="card-statistic-3 p-4">
        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
        <div class="mb-4">
            <h5 class="card-title mb-0">Total point fidélité</h5>
        </div>
        <div class="row align-items-center mb-2 d-flex">
            <div class="col-8">

                <!-- <h1>Nombre Total de point</h1> -->
                <tr>
                    <h1>' . $total . '</h1>

                </tr>

            </div>
        </div>';
