
  <main role="main">
<?php if($vue == 1){?>
   <section class="jumbotron text-center">
      <div class="container">
        <h1>Résultat</h1></p>
         <table class=" table mt-3 shadow-lg p-3 mb-5">
                          <thead>
                            <tr class="table bg-dark">
                                <th scope="col" class="col-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 text-light">Les pays parlant <?php echo $langue;?></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($lesPays as $lesPays) {?>
                            <tr class="table">
                              <td><?php echo $lesPays->PaysName ?> </td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
      </div>
    </section>
  <?php 
} 
?>

<?php if($vue == 2){?>
    <main role="main">
    <section class="jumbotron text-center">
      <div class="container">
        <h1>Résultat</h1></p>
         <table class=" table mt-3 shadow-lg p-3 mb-5">
                          <thead>
                            <tr class="table bg-dark">
                                <th scope="col" class="col-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 text-light">Les pays ayant une espérance de vie supérieur ou égale à  <?php echo $percentage;?> %</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($lesPays as $lesPays) {?>
                            <tr class="table">
                              <td><?php echo $lesPays->Pays ?> </td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
      </div>
    </section>
<?php 
}
?>
