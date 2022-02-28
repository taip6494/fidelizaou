<?php
include("C:/xampp/htdocs/fidelizaou/entreprise/modules/ajout_point/add_point.php");
?>
<?= @$msg ?>
<form method="POST" >
        <div class="mb-3">
            <input type="text" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" class="form-control" name="Num_tel" placeholder="numero_tel">
        </div>
        <div class="mb-3">
            <input type="text"  name="point" placeholder="nombredepoint" class="form-control" >
        </div>
      <button type="submit" class="btn btn-primary" name="submitBtn">Ajouter</button>
        
      </form>
      
 