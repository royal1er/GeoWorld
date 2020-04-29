
  <?php if ($i == 2) {?>
    <div class="row ml-3 alert w-25">
        <div class=" alert alert-danger text-center" role="alert">
                <p>Le champ est vide</p>
        </div>
    </div>
    <?php 
  }
    ?>
    <?php if($i == 1){?>
      <div class="row ml-3 alert w-25">
        <div class=" alert alert-danger text-center" role="alert">
                <p>La langue n'existe pas en base de données</p>
        </div>
    </div>
    <?php
}
?>