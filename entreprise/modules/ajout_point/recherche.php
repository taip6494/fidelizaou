<?php
include("C:/xampp/htdocs/fidelizaou/modules/connexiondb/connexiondb.php");
$msg = "";
if (isset($_POST['submitBtnrecherche'])) {
    $Numero_tel = trim($_POST['Num_tel']);
    if ($Numero_tel != "") {
        try {
            $query = "SELECT * FROM utilisateur WHERE Numero_tel=:Numero_tel";
            $stmt = $db->prepare($query);
            $stmt->bindParam('Numero_tel', $Numero_tel, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($count == 1 && !empty($row)) {
                
            }

        }catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
          }
    }else{
        echo 'Numero téléphone introuvable';
    }
}
