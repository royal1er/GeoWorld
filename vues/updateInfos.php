<?php
if(!isset($_SESSION)){
    session_start();
}
$desInfos = getInfosCountries($country);
foreach ($desInfos as $desInfos) {
$id = $desInfos->id;
    ?>
<div class="row justify-content-between pl-5">
    <a href="javascript:history.back(1)"><button type="button" class="btn btn-info"><i class="fas fa-undo-alt"></i> Retour</button></a>
</div>
    <h1 class=" text-center"><?php echo $country ?></h1>

<form class="bg-light p-3 m-3 rounded shadow-lg" method="POST" action=<?php echo "index.php?action=update&task=updateData&id=".$id.""?>>
  <div class="form-row p-3">
    <div class="form-group col-md-4">
      <label for="Région">Région</label>
      <input type="text" class="form-control" value="<?php echo $desInfos->Region; ?>" name="Région">
    </div>
    <div class="form-group col-md-4">
      <label for="Superficie">Superficie km²</label>
      <input type="number" class="form-control" value="<?php echo $desInfos->SurfaceArea ?>" name="Superficie">
    </div>
    <div class="form-group col-md-4">
        <label for="IndepYear">Année d'indépendance</label>
        <input type="number" class="form-control" value="<?php echo $desInfos->IndepYear ?>" name="IndepYear">
    </div>
  </div>
  <div class="form-row p-3 justify-content-center">
    <div class="form-group col-md-3">
      <label for="Population">Nombre d'habitants</label>
      <input type="number" class="form-control"  value="<?php echo $desInfos->Population ?>" name="Population">
    </div>
    <div class="form-group col-md-3">
      <label for="LifeExpectancy">Espérance de vie (en %)</label>
      <input type="number" step= "0.1" class="form-control" value="<?php echo $desInfos->LifeExpectancy ?>" name="LifeExpectancy">
    </div>
  </div>
  <div class="form-row p-3">
    <div class="form-group col-md-4">
      <label for="GNP">Produit National Brut</label>
      <input type="number" class="form-control"value="<?php echo $desInfos->GNP ?>" name="GNP">
    </div>
    <div class="form-group col-md-4">
      <label for="GovernmentForm">Forme de gouvernement</label>
      <input type="text" class="form-control"value="<?php echo $desInfos->GovernmentForm ?>" name="GovernmentForm">
    </div>
    <div class="form-group col-md-4">
      <label for="HeadOfState">Chef d'état</label>
      <input type="text" class="form-control" value="<?php echo $desInfos->HeadOfState ?>" name="HeadOfState">
    </div>
  </div>
  <div class="row justify-content-center">
    <button type="submit" class=" btn btn-success">Enregistrer les modifications</button>
  </div>
</form>
<?php
}
?>
<?php
require_once 'js/javascripts.php';
require_once "$racine/vues/footer.php";
?>