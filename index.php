<?php  require_once 'header.php'; ?>
<main role="main" class="flex-shrink-0">

  <!-- <div class="container">
    <h1>Découvrez les pays </h1>
    </div>
    <p></p>
    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Tableau d'objets</h1>
        <p>Le code ci-dessus représente une vue "debug" du premier élément d'un tableau. Ce tableau est
          constitué d'objets PHP "standard" (stdClass).</p>
        <p>Pour accéder à l'<b>attribut</b> d'un <b>objet</b> on utilisera le symbole <code>-></code></p>
        <p>Ainsi, pour accéder au nom du premier pays de la liste
          <code>$desPays</code> on fera <b><code>$desPays[0]->Name</code></b>
        </p>
        <p>La variable <b><code>$desPays</code></b> référence un tableau (<i>array</i>).
          Ainsi, pour générer le code HTML (table), devriez vous coder une boucle,
          par exemple de type <b><code>foreach</code></b> sur l'ensembles des objets de ce tableau. </p>
        <p>Référez-vous à la structure des tables pour connaître le nom des <b><code>attributs</code></b>.
          En effet, les objets du tableau ont pour attributs (nom et valeur)
          le nom des colonnes de la table interrogée par un requête SQL, via l'appel à la
          fonction <b><code>getCountriesByContinent</code></b> (du script <b><code>manager-db.php</code></b>.</p>
        <p>Par exemple <b><code>Name</code></b> est une des colonnes de la relation (table) <b><code>Country</code></b>)</p>

      </div>
    </section>
  </div> -->
  <!-- On affiche la liste des pays par continent si un continent est sélectionner -->
  <div class="container">
  <?php 
  if(isset($_GET['Continent'])) 
  { 
    $selectedContinent = $_GET['Continent']; 
    ?>
    <h1 class=" text-center mb-3">Les pays en <?php echo $selectedContinent ?> </h1>
    <?php
            require_once 'inc/manager-db.php';            
            $desPays = getCountriesByContinent($selectedContinent);
         ?>
       <code>
         <!-- <?php var_dump($desPays[0]); ?> -->
         <?php 
         echo '<div class="row">';
          foreach ($desPays as $desPays) { ?>
               
            <?php echo '<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-3 ">
                              <a class="text-light " href="infos.php?Name='.$desPays->Name.'"><button type="button" class="btn btn-info w-100 h-100 shadow p-3 mb-5 rounded-lg">'.$desPays->Name.'</button></a>
                        </div>'; 
     }
     echo '</div>';
    }    ?>
      </code>
  </div>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
