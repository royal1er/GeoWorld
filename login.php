<?php  require_once 'header.php'; ?>
<div class="container  rounded justify-content-center">
<div class="row justify-content-center">
<form class="bg-light p-5 rounded shadow-lg">
<h1>CONNEXION</h1>
  <div class="form-group">
    <label for="exampleInputEmail1">Login</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
  </div>
  <button type="submit" class="btn btn-danger">Connexion</button>
</form>
</div>
</div>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>