<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<div class="container  rounded justify-content-center">
<div class="row justify-content-center">
<form class="bg-light p-5 rounded shadow-lg" method="POST" action="index.php?action=connexion&task=valideConnexion">
<h1>CONNEXION</h1>
  <div class="form-group">
    <label for="exampleInputLogin1">Login</label>
    <input type="text" class="form-control" id="exampleInputLogin1" name="login">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
  </div>
  <button type="submit" class="btn btn-danger" name="connexion">Connexion</button>
</form>
</div>
</div>
<?php
require_once 'js/javascripts.php';
require_once "$racine/vues/footer.php";
?>
