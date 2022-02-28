<?php
$id = $_SESSION['sess_user_id'];

// récupérer b point
// $sql = "SELECT `Date_achat`,`Nb_point`,SUM(Nb_point) AS TOTAL FROM historique_achat WHERE idUtilisateur =IdUtilisateur";
$sql = "SELECT * FROM historique_achat WHERE idUtilisateur =:idUtilisateur ";



try {

  $stmt = $db->prepare($sql);
  $stmt->bindParam('idUtilisateur', $id, PDO::PARAM_STR);
  $stmt->execute();
// get total rows

  // $stmt = $db->query($sql1);
  if ($stmt == 0) {
    $msgcotes = "en cours d'actualisation";
  }
  if ($stmt === false) {
    die("Erreur");
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}
