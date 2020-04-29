<?php
require_once 'header.php';
if(!isset($_SESSION)){
    session_start();
}
?>
<!-- <h2 style="text-align: center;">Personnalisation des requêtes</h2>

<form method="POST" action="index.php?uc=request&action=afficherequete">
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Saisissez vôtre requête</span>
  </div>
  <textarea class="form-control" aria-label="With textarea" type="text" name = "request"></textarea>
</div>
<button type="submit" class="btn btn-primary" name = "SQL">Envoyer</button>
</form> -->
                  <!-- Bouton  -->
                <p class=" row justify-content-center">
                <button class="btn btn-danger ml-2" type="button" data-toggle="collapse" data-target="#Request1" aria-expanded="false" aria-controls="collapseExample">Afficher les pays parlant une langue</button></p>
                
                  <!-- Bouton -->
                  <div class=" mb-3 row justify-content-center">
                      <div class="collapse" id="Request1">
                        <form method="POST" action="index.php?uc=request&action=PaysLanguage">
                          <div class="form-group">
                            <label for="request1">Langue</label>
                            <input type="text" class="form-control"  name="Langue">
                          </div>
                          <button type="submit" class="btn btn-primary" name = "SQL">Envoyer</button>
                          </div>
                        </form>
                      </div>
                  </div>
                  <!-- Bouton  -->
                  <p class=" row justify-content-center">
                  <button class="btn btn-danger ml-2" type="button" data-toggle="collapse" data-target="#Request2" aria-expanded="false" aria-controls="collapseExample">Espérence de vie d'un pays</button></p>
                
                  <!-- Bouton -->
                  <div class=" mb-3 row justify-content-center">
                      <div class="collapse" id="Request2">
                        <form>
                          <div class="form-group">
                            <label for="request1">Pays</label>
                            <input type="text" class="form-control"  name="">
                          </div>
                          <button type="submit" class="btn btn-primary" name = "SQL">Envoyer</button>
                          </div>
                        </form>
                      </div>
                  </div>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
