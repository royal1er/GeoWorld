<?php  require_once 'header.php'; ?>
<div class="container">
  <?php
  if(isset($_GET['Name']))
  {

    $selectedCountry= $_GET['Name'];
    ?>
    <h1>Les informations concernant <?php echo $selectedCountry ?> </h1>
    <?php
            require_once 'inc/manager-db.php';
            $desInfos = getInfosCountries($selectedCountry);
            $laLangue = getLanguageByCountry($selectedCountry);
         ?>
       <code>
         <!-- <?php var_dump($desPays[0]); ?> -->
         <?php
          foreach ($desInfos as $desInfos) {
            ?>
            <table>
                    <tbody>
                    <tr>
                        <th scope="col">Libelle</th>
                        <th scope="col">Infos</th>
                    </tr>
                    <tr>
                        <td> Continent</td>
                        <td> <?php echo $desInfos->Continent?> </td>
                    </tr>
                     <tr>
                        <td> Region</td>
                        <td><?php echo $desInfos->Region ?></td>
                    </tr>
                     <tr>
                        <td> Superficie</td>
                        <td><?php echo $desInfos->SurfaceArea ?></td>
                    </tr>
                     <tr>
                        <td> Année d'indépendance</td>
                        <td><?php echo $desInfos->IndepYear ?></td>

                    </tr>
                    <tr>
                       <td> Langue parlé</td>
                      <td><?php foreach ($laLangue as $laLangue) {
                        echo $laLangue->Name.'<br>';
                      }
                        ?><td>
                   </tr>
                     <tr>
                        <td> Nb Habitants</td>
                        <td><?php echo $desInfos->Population ?></td>
                    </tr>';

     <?php
   }
 }
        ?>
      </code>
    </div>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
