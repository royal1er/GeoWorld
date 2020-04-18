<?php if(isset($_SESSION['enseignant'])){
  ?>
  <main role="main">

    <section class="jumbotron text-center">
      <div class="container">
        <h1>Conseils</h1>
        <p class="lead text-muted">var_dump() la variable utilisé pour affiché le contenu ici, affiche les informations structurées d'une variable, y compris son type et sa valeur. Les tableaux et les objets sont explorés récursivement, avec des indentations, pour mettre en valeur leur structure.</p>
      </div>
    </section>
<?php
}
echo var_dump($enseignant);
?>
