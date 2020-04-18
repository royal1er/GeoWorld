<?php
require_once 'header.php';
if(!isset($_SESSION)){
    session_start();
}
?>
<h2 style="text-align: center;">Personnalisation des requêtes</h2>

<form method="POST" action="index.php?uc=request&action=afficherequete">
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Saisissez vôtre requête</span>
  </div>
  <textarea class="form-control" aria-label="With textarea" type="text" name = "request"></textarea>
</div>
<button type="submit" class="btn btn-primary" name = "SQL">Envoyer</button>
</form>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
