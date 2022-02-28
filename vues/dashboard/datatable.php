<?php
include("modules/connexiondb/connexiondb.php");
include("modules/lister/requete_affiche.php");
// include("modules/total/total_requete.php");
?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Récapitulatif
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Date </th>
                    <th>Nombre de point</th>

                </tr>
            </thead>

            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Date_achat']); ?></td>
                        <td><?php echo htmlspecialchars($row['Nb_point']); ?></td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>


    </div>

</div>


<?php
include("vues/dashboard/total.php");

?>