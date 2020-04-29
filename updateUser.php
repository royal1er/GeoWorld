<?php
require_once 'header.php';
if(!isset($_SESSION)){
    session_start();
}
require_once 'inc/manager-db.php';
$id = $_SESSION['idVisiteur'];
$desInfos = getInfosUserById($id);
foreach ($desInfos as $desInfos) {
    ?>
<div class="row justify-content-between pl-5">
    <a href="javascript:history.back(1)"><button type="button" class="btn btn-info"><i class="fas fa-undo-alt"></i> Retour</button></a>
</div>
<form class="bg-light container center_div rounded shadow-sm col-md-3 ml-auto" method="POST" action=<?php echo "index.php?uc=update&action=updateUserData&id=".$id.""?>>
  <div class="form-row container center_div">
    <div class="form-group p-3  container center_div">
      <label for="Nom" data-toggle="tooltip" title="Vous pouvez modifier votre nom">Nom</label>
      <input type="text" class="form-control" value="<?php echo $desInfos->nom; ?>" name="nom">
    </div>
  </div>
  <div class="form-row p-3 container center_div">
    <div class="form-group container center_div">
      <label for="Prenom" data-toggle="tooltip" title="Vous pouvez modifier votre prenom">Prenom</label>
      <input type="text" class="form-control" value="<?php echo $desInfos->prenom ?>" name="prenom">
    </div>
  </div>
  <div class="form-row p-3 container center_div">
    <div class="form-group  container center_div">
        <label for="login" data-toggle="tooltip" title="Vous pouvez modifier votre identifiant">Login</label>
        <input type="text" class="form-control" value="<?php echo $desInfos->login ?>" name="login">
    </div>
  </div>
  </div>
  <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
  <div class="row p-3 justify-content-center">
    <button type="submit" class=" btn btn-success">Enregistrer les modifications</button>
  </div>
</form>
<?php
}
?>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
