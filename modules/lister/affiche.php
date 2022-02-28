<?php

include("http://localhost/fidelizaou/modules/connexiondb/connexiondb.php");
include("http://localhost/fidelizaou/modules/lister/requete_affiche.php");
?>

<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
  <hr>
  <tr>
    <td><?php echo htmlspecialchars($row['Nb_point']); ?></td>

    <td><?php echo htmlspecialchars($row['Date_achat']); ?></td>

  </tr>

<?php endwhile; ?>