<?php
  require_once 'connect-db.php';

  if(isset($_GET['country'])){
    $country = (String) trim($_GET['country']);

      $req = "SELECT * FROM country WHERE Name LIKE '$country%' LIMIT 10";
      $prep = $pdo->prepare($req);
      $prep->execute();
      $prep = $prep->fetchAll();


    foreach($prep as $p){
      ?>
        <div style="margin-top: 20px 0; border-bottom: 2px solid #ccc"><a class="dropdown-item" href="index.php?action=request&task=infospays&Name=<?php echo $p->Name?>"><?php echo $p->Name ?><a></div><?php
    }
}
  ?>
