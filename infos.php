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
         ?>
       <code>
         <!-- <?php var_dump($desPays[0]); ?> -->
         <?php 
          foreach ($desInfos as $desInfos) { 
            echo '<table>
                    <tbody>
                    <tr>
                        <th scope="col">Libelle</th>
                        <th scope="col">Infos</th>
                    </tr>
                    <tr>
                        <td> Region</td>
                        <td>'.$desInfos->Continent .'</td>
                    </tr> 
                     <tr>
                        <td> Continent</td>
                        <td>'.$desInfos->Region .'</td>
                    </tr>
                     <tr>
                        <td> Superficie</td>
                        <td>'.$desInfos->SurfaceArea .'</td>
                    </tr>
                     <tr>
                        <td> Année d_indépendance</td>
                        <td>'.$desInfos->IndepYear .'</td>
                    </tr>
                     <tr>
                        <td> Nb Habitants</td>
                        <td>'.$desInfos->Population .'</td>
                    </tr>';
     }
    }    ?>
      </code>
    </div>
    <?php
require_once 'javascripts.php';
require_once 'footer.php';
?>