<?php
$msg = "";
if (isset($_POST['submitBtnLogin'])) {
  $Numero_tel = trim($_POST['Numero_tel']);
  $Mdp = trim($_POST['Mdp']);
  if ($Numero_tel != "" && $Mdp != "") {
    try {

        //SELECT * FROM `connexion` as connexion JOIN utilisateur as utilisateur ON ( connexion.`IdUtilisateur` = utilisateur.`IdUtilisateur` ) WHERE utilisateur.Numero_tel='0693332683'and connexion.Mdp='1234';
      $query = "SELECT * FROM connexion as connexion JOIN utilisateur as utilisateur ON ( connexion.IdUtilisateur = utilisateur.IdUtilisateur ) WHERE utilisateur.Numero_tel=:Numero_tel and connexion.Mdp=:Mdp";
      $stmt = $db->prepare($query);
      $stmt->bindParam('Numero_tel', $Numero_tel, PDO::PARAM_STR);
      $stmt->bindValue('Mdp', $Mdp, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($count == 1 && !empty($row)) {
        /******************** Your code ***********************/
        $_SESSION['sess_user_id'] = $row['idUtilisateur'];
        $_SESSION['sess_user_name'] = $row['Nom'];
        $_SESSION['sess_user_prenom'] = $row['Prenom'];
        $_SESSION['sess_user_mail'] = $row['Adresse_mail'];
        $_SESSION['sess_user_tel'] = $row['Numero_tel'];
        $_SESSION['sess_user_dateN'] = $row['Date_naissance'];
        $_SESSION['sess_user_codeP'] = $row['Code_postal'];
        $_SESSION['sess_user_civilite'] = $row['Civilité'];
        header('location:http://localhost/fidelizaou/home.php');
      } else {
        $msg = '<div class="alert alert-danger" role="alert">
            Numéro ou mot de passe incorrect
        </div>';
      }
    } catch (PDOException $e) {
      echo "Error : " . $e->getMessage();
    }
  } else {
    $msg = "Remplir les champs requis!";
  }
}
