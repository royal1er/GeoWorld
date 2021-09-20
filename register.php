<?php  require_once 'header.php'; ?>
<div class="container  rounded justify-content-center">
<div class="row justify-content-center">
<form class="bg-light p-5 rounded shadow-lg" method="POST" action="index.php?uc=connexion&action=inscription">
<h1>INSCRIPTION</h1>
  <div class="form-group">
    <label for="exampleInputName">Nom</label>
    <input type="text" class="form-control" id="Nom" name="nom">
  </div>
  <div class="form-group">
    <label for="exampleInputFName">Prénom</label>
    <input type="text" class="form-control" id="prenom" name="prenom">
  </div>
  <div class="form-group">
    <label for="exampleInputFName">Adresse mail</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="mail"> 
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Identifiant</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword" placeholder="8 caractères" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au mois 8 caractères ainsi qu'au moins une majuscule, une minuscule et un chiffre" name="password">
  </div>
  <div class="form-group">
  <label for="exampleInputRole">Role</label>
   <select id="inputState" class="form-control" name="role">
        <option value="1">Collaborateur</option>
        <option value="0">Enseignant</option>
    </select>
  </div>
  <button type="submit" class="btn btn-danger">S'inscrire</button>
</form>
</div>
</div>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
