<?php
//connexion base de données
include("C:/xampp/htdocs/fidelizaou/modules/connexiondb/connexiondb.php");
//Intilser la variable $msg 
$msg = "";
if (isset($_POST['submitBtn'])) {
//Récolte des informations par le formulaire (fidelizaou\entreprise\vues\ajout_point\form_ajout_point.php)
$Numero_tel = trim($_POST['Num_tel']);
$point = trim($_POST['point']);
    //Trouver l'utilisateur (id) avec le numéro téléphone 
    $stmt = $db->prepare("SELECT * FROM utilisateur WHERE Numero_tel=:Numero_tel");
    $stmt->execute([$Numero_tel]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $idUtilisateur = $row['idUtilisateur'];
    // Afficher idUtilisateur
    //echo $idUtilisateur;

    //Date du jour
    $date = date('y-m-d');
    //echo $date;
    //Insertion des point client avec idUtilisateur
     $sql = "INSERT INTO historique_achat (IdAchat,IdUtilisateur,Nb_point,Date_achat) values ('',:idUtilisateur,:Nb_point,:Date_achat)";
            try {
                $stmt = $db->prepare($sql);
                $stmt->bindValue('idUtilisateur', $idUtilisateur, PDO::PARAM_STR);
                $stmt->bindValue('Nb_point', $point, PDO::PARAM_STR);
                $stmt->bindValue('Date_achat', $date, PDO::PARAM_STR);
                $stmt->execute();
                if ($stmt == true) {
        
        $msg = '<div class="alert alert-success" role="alert"> Les point sont ajouter au numéro : '. $Numero_tel.' Point Ajouter est de '. $point .'</div>';
        }else{
            $msg = '<div id="ok" class="alert alert-success" role="alert">
            A simple success alert—check it out!
          </div>
          ';
        }
        
        //var_dump($sql);
        
        if ($stmt === false) {
        die("Erreur");
        }
        } catch (PDOException $e) {
        }
    }
        
    
    
    





?>