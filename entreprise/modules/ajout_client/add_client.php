<?php

include("C:/xampp/htdocs/fidelizaou/modules/connexiondb/connexiondb.php");
$msg = "";
$Civilite = trim($_POST['Civilite']);
$Nom = trim($_POST['Nom']);
$Prenom = trim($_POST['Prenom']);
$Adresse_mail = trim($_POST['Adresse_mail']);
$Numero_tel = trim($_POST['Numero_tel']);
$Date_naissance = trim($_POST['Date_naissance']);
$Code_postal = trim($_POST['Code_postal']);
$Numero_tel = trim($_POST['Numero_tel']);

//openssl_random_pseudo_bytes — Génère une chaine pseudo-aléatoire d'octets
$bytes = openssl_random_pseudo_bytes(4);
//Convertit des données binaires en représentation hexadécimale
$pass = bin2hex($bytes);
echo $pass .  ' ';
//password_hash — Crée une clé de hachage pour un mot de passe
$password = password_hash($pass, PASSWORD_DEFAULT);
echo $password;

    $stmt = $db->prepare("SELECT * FROM utilisateur WHERE Numero_tel=?");
    $stmt->execute([$Numero_tel]); 
    $user = $stmt->fetch();
    if ($user) {
      echo '<div class="alert alert-danger" role="alert">
     Ce numéro de téléphone existe déja.
     <a class="nav-link" href="http://localhost/fidelizaou/entreprise/ajout_client.php">
     <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
     Resumer
 </a>
    </div>';
    } else {

            $sql = "INSERT INTO utilisateur (Nom, Prenom, Adresse_mail, Numero_tel, Date_naissance, Code_postal, Civilite) Values (:Nom, :Prenom, :Adresse_mail, :Numero_tel, :Date_naissance, :Code_postal, :Civilite)";
            try {
            
                $stmt = $db->prepare($sql);
                $stmt->bindValue('Civilite', $Civilite, PDO::PARAM_STR);
                $stmt->bindValue('Nom', $Nom, PDO::PARAM_STR);
                $stmt->bindValue('Prenom', $Prenom, PDO::PARAM_STR);
                $stmt->bindValue('Adresse_mail', $Adresse_mail, PDO::PARAM_STR);
                $stmt->bindValue('Numero_tel', $Numero_tel, PDO::PARAM_STR);
                $stmt->bindValue('Date_naissance', $Date_naissance, PDO::PARAM_STR);
                $stmt->bindValue('Code_postal', $Code_postal, PDO::PARAM_STR);
                $stmt->execute();
                if ($stmt == true) {
        
        $msg = "Client bien ajouter";
        }
        
        
        if ($stmt === false) {
        die("Erreur");
        }
        } catch (PDOException $e) {
        }

        $recup = "SELECT * FROM utilisateur ORDER BY idUtilisateur DESC LIMIT 1";
        try{
            $stmt = $db->query($recup);
            
            if ($stmt == true) {
        
                $msg = "bien récupérer";
                }

        }catch(PDOException $e){

        }

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

       
        //var_dump($row);

       echo  $idutilisateur = $row['idUtilisateur'];


        $insert = "INSERT INTO connexion (idUtilisateur, Mdp) Values (:idUtilisateur, :Mdp)";
        try {
        
            $stmt = $db->prepare($insert);
            $stmt->bindParam('idUtilisateur', $idutilisateur, PDO::PARAM_STR);
            $stmt->bindParam('Mdp', $password, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt == true) {
          
              $msg = "Aucun résultat pour votre recherche";
            }
          
          
            if ($stmt === false) {
              die("Erreur");
            }
          } catch (PDOException $e) {
          }
        
        
        
    } 
    
echo $Adresse_mail ;
    


    $dest =  $Adresse_mail;
    $sujet = "Mot de passe fidelizaou";
    $corp = "Bonjour votre mot de passe est $pass";
    $headers = "From: palisseauthomas@gmail.com";
    if (mail($dest, $sujet, $corp, $headers)) {
      echo "Email envoyé avec succès à $dest ...";
    } else {
      echo "Échec de l'envoi de l'email...";
    }

    


?>
