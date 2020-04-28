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
<form class="bg-light p-3 m-3 rounded shadow-lg" method="POST" action=<?php echo "index.php?uc=update&action=updateUserData&id=".$id.""?>>
  <div class="form-row p-3">
    <div class="form-group col-md-4">
      <label for="Nom">Nom</label>
      <input type="text" class="form-control" value="<?php echo $desInfos->nom; ?>" name="nom">
    </div>
    <div class="form-group col-md-4">
      <label for="Prenom">Prenom</label>
      <input type="text" class="form-control" value="<?php echo $desInfos->prenom ?>" name="prenom">
    </div>
    <div class="form-group col-md-4">
        <label for="login">Login</label>
        <input type="text" class="form-control" value="<?php echo $desInfos->login ?>" name="login">
    </div>
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
require_once 'javascripts.php';
require_once 'footer.php';
?>
