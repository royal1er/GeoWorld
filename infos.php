<?php  require_once 'header.php'; ?>
<div class="container">
<div class="row justify-content-between">
<a href="javascript:history.back(1)"><button type="button" class="btn btn-info"><i class="fas fa-undo-alt"></i> Retour</button></a> <i class="fas fa-book-reader"></i>
 </div>
  <?php
  if(isset($_GET['Name']))
  {

    $selectedCountry = $_GET['Name'];
    ?>
    <h1 class=" text-center"><?php echo $selectedCountry ?></h1>
    <?php
            require_once 'inc/manager-db.php';
            $desInfos = getInfosCountries($selectedCountry);
            $laLangue = getLanguageByCountry($selectedCountry);
         ?>
       <code class=" row justify-content-center">
            <table class=" table mt-3 shadow-lg p-3 mb-5">
                    <thead>
                    <tr class="table bg-dark">
                        <th scope="col" class="w-50 text-light">Libellé</th>
                        <th scope="col" class="w-50 text-light"><i class="fas fa-info-circle"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                  <?php
                    foreach ($desInfos as $desInfos) {
                      ?>
                    <tr class="table">
                        <td><i class="fas fa-globe"></i></i>&nbsp Continent</td>
                        <td> <?php echo $desInfos->Continent ?> </td>
                    </tr>
                     <tr class="table bg-info">
                        <td><i class="fas fa-globe-africa"></i>&nbsp Region</td>
                        <td><?php echo $desInfos->Region ?></td>
                    </tr>
                     <tr class="table">
                        <td><i class="fas fa-arrows-alt"></i>&nbsp Superficie</td>
                        <td><?php echo $desInfos->SurfaceArea ?> km²</td>
                    </tr>
                     <tr class="table bg-info">
                        <td><i class="fas fa-sort-numeric-up"></i>&nbsp Année d'indépendance</td>
                        <td><?php echo $desInfos->IndepYear ?></td>
                    </tr>
                    <tr class="table">
                       <td><i class="fas fa-language"></i>&nbsp Langue(s) parlée(s)</td>
                       <td> <?php foreach ($laLangue as $laLangue) {
                         echo $laLangue->Name.' - ';
                        }
                        ?></td>
                   </tr>
                     <tr class="table bg-info">
                        <td> <i class="fas fa-user-friends"></i>&nbsp Nombre d'habitants</td>
                        <td><?php echo $desInfos->Population ?></td>
                    </tr>
                     <tr class="table">
                        <td><i class="fas fa-heartbeat"></i>&nbsp Espérance de vie</td>
                        <td><?php echo $desInfos->LifeExpectancy ?> %</td>
                    </tr>
                     <tr class="table bg-info">
                        <td><i class="fas fa-money-check-alt"></i>&nbsp Produit National Brut</td>
                        <td><?php echo $desInfos->GNP ?> <i class="fas fa-euro-sign"></i></td>
                    </tr>
                     <tr class="table">
                        <td><i class="fas fa-gavel"></i>&nbsp Forme de gouvernement</td>
                        <td><?php echo $desInfos->GovernmentForm ?></td>
                    </tr>
                     <tr class="table bg-info">
                        <td><i class="fas fa-user-circle"></i>&nbsp Chef d'état</td>
                        <td><?php echo $desInfos->HeadOfState ?></td>
                    </tr>
                      <?php
                    }?>
                      </tbody>
                  </table>
        </code>
                  <!-- Bouton affichant les villes dans le pays -->
                  <p class=" align-content-center">
                  <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#CitiesView" aria-expanded="false" aria-controls="collapseExample">Afficher / Masquer les villes</button></p>
                
                  <!-- Bouton affichant les villes dans le pays -->
                      <div class="collapse" id="CitiesView">
                        <table class=" table mt-3 shadow-lg p-3 mb-5">
                          <thead>
                            <tr class="table bg-dark">
                                <th scope="col" class="col-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 text-light">Villes</th>
                                <th scope="col" class="col-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 text-light">Territoires</th>
                                <th scope="col" class="col-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 text-light">Population</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $cities = getCitiesByCountry($selectedCountry);
                            foreach($cities as $cities) {?>
                            <tr class="table">
                              <td><?php echo $cities->Name ?> </td>
                              <td><?php echo $cities->District ?> </td>
                              <td><?php echo $cities->Population ?> pers.</td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
            <?php
                  }
                      ?>
    </div>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
