<?php
require_once 'header.php';
if(!isset($_SESSION)){
    session_start();
}
require_once 'inc/manager-db.php';
$id = $_SESSION['idVisiteur'];
$mdp = getPassword($id);
?>

<div class="row justify-content-between pl-5">
    <a href="javascript:history.back(1)"><button type="button" class="btn btn-info"><i class="fas fa-undo-alt"></i> Retour</button></a>
</div>
<form class="bg-light container center_div rounded shadow-sm col-md-3 ml-auto" method="POST" action=<?php echo "index.php?action=update&task=updatePassword&id=".$id.""?>>
  <div class="form-row p-3 container center_div">
    <div class="form-group container center_div">
      <label for="mdp">Saisissez votre ancient mot de passe</label>
      <input type="password" class="form-control" name="mdp">
    </div>
  </div>
    <div class="form-row p-3 container center_div">
      <div class="form-group container center_div">
        <label for="newmdp">Saisissez votre nouveau mot de passe</label>
        <input type="password" class="form-control" name="newmdp">
      </div>
  </div>
  <div class="row p-3 justify-content-center">
    <button type="submit" class=" btn btn-success">Enregistrer les modifications</button>
  </div>
</form>

<?php
require_once 'js/javascripts.php';
require_once "$racine/vues/footer.php";
?>
