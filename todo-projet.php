<?php require_once 'header.php'; ?>

<div class="container">
  <h1>Le projet GeoWorld</h1>
  <div>
    <div class="box shadow p-3">
      <div class="ribbon"><span>Présentation</span></div>
      <p>L'application est destinée à des professeurs d'histoire et de géographie.</p>
      <p>Elle doit permettre aux professeurs, comme aux élèves, de consulter des données géopolitiques et
        économiques de la planète. Ces données ont été communiquées par l'institut Official Statistics of
        Finland (2006).
      </p>
      <p>Étant donné l'âge de ces données, il faudra mettre en place un (ou plusieurs) moyen(s) de les mettre
        à jour.</p>
      <p>Les acteurs et leurs intérêts :</p>
      <ul>
        <li><b>Enseignant</b> : souhaite sensibiliser ses élèves à des données géoplitiques et économiques
          de la
          planète
        </li>
        <li><b>Elève</b> : aimerait disposer d'un outil qui réponde à ses interrogations ainsi que prendre
          plaisir à consulter les
          informations présentées
        </li>
        <li><b>Administrateur</b> : disposer d'une interface d'administration de l'application (gestion des
          utilisateurs, leurs droits)
        </li>
      </ul>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    <div class="box shadow p-3" style="margin-top: 2rem">
      <div class="ribbon red"><span>Use Case</span></div>
      <img class="img-fluid" style="max-width: 100%" src="images/useCaseWorld.png" aria-label="Diag. Use Case">
    </div>

    <div class="box shadow p-3" style="margin-left: 3rem; margin-top: 2rem">
      <div class="ribbon blue"><span> SR </span></div>
      <img class="img-fluid" src="images/worldSR.png">
      <p></p>
      <p>Télécharger ici : <a href="doc/world-database.zip">Schéma de la base de données + data</a></p>
    </div>
  </div>

  <div class="d-flex justify-content-center">
    <div class="box shadow p-3" style="margin-top: 2rem">
      <div class="ribbon red"><span>Objectifs </span></div>
      <p></p>
      <ul>
        <li>Proposer une interface de consultation agréable, ergonomique (vue des données par continents,
          pays, capitales, langues parlées, et autres idées...)
        </li>
        <li>Permettre à des collaborateurs de mettre à jour des données</li>
        <li>Un proposition pour les plus avancés:
          <p>Permettre à l'enseignant de mettre au point des requêtes d'interrogation
            personnalisées (SQL SELECT) </p>

          <ol>
            <li>Les requêtes pourront être sauvegardées et nommées</li>
            <li>Les requêtes pourront avoir une portée publique ou privée</li>
          </ol>
        </li>
      </ul>
    </div>

    <div class="box shadow p-3" style="margin-left: 3rem; margin-top: 2rem">
      <div class="ribbon blue"><span>TP intro</span></div>
      <p></p>
      <ol>
        <li>Télécharger les scripts SQL de la base de données de démarrage (format mysql)</li>
        <li>Créer une base de données, et initialiser cette dernière à l'aide des 2 scripts en question</li>
        <li>Adapter le script <code>connect-db.php</code> en conséquence</li>
        <li>Poursuivre la programmation de <code>index.php</code> afin de présenter à l'utilisateur la liste
          des pays
          du continent asiatique.
        </li>
        <li>Ajouter une entrée dans la barre de menu afin de permettre à l'utilisateur de sélectionner un continent (et d'en afficher les pays).
          Pour cela, vous utiliserez un menu <b><code>Dropdown</code></b>.</li>
      </ol>
      <p>À l'issue de ce travail, vous serez prêt à vous engager plus en avant dans ce projet.</p>

    </div>
  </div>

  </div>

    <?php
    require_once 'javascripts.php';
    require_once 'footer.php';
    ?>
