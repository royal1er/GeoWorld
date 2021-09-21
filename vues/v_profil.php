<?php
require_once 'header.php';
if(!isset($_SESSION)){
    session_start();
}
require_once("inc/manager-db.php");
require_once("inc/connect-db.php");
$id = $_SESSION['idVisiteur'];
?>
<form method="POST" action="index.php?action=update&task=updateUser">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-lg-8 col-md-6">
                <h3 class="mb-0 text-truncated"><?php echo $_SESSION['nom']."  ".$_SESSION['prenom']?></h3>
                <p class="lead"><?php echo getRole($id);?></p>
                <p>Bienvenue sur votre compte utilisateur</p>
              </div>
              <div class="col-12 col-lg-4 col-md-6 text-center">
                <img src=<?php echo "https://robohash.org/".$_SESSION['prenom']?> alt="" class="mx-auto rounded-circle img-fluid shadow-sm">
                <br>
              </div>
              <div class="col-12 col-lg-4">
                <button class="btn btn-outline-info btn-block"><span class="fa fa-user"></span>Éditez votre profil</button>
                <a href="index.php?action=account&task=password" class="btn btn-outline-danger btn-block"  role="button">Changer mon mot de passe</a>
              </div>
              <!--/col-->
            </div>
            <!--/row-->
          </div>
          <!--/card-block-->
        </div>
      </div>
    </div>
  </div>
</form>
<?php
require_once 'js/javascripts.php';
require_once "$racine/vues/footer.php";
?>
