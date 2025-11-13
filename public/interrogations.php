<?php  
/**-----EMBARQUATION DE L'ENTÊTE DES PAGES -------------- */
 include __DIR__.'\html_comp_header.html';
 require_once __DIR__.'\..\database\controllers\controller.php'; 
 include __DIR__.'\individu_requests.php';
?>



<?php  
  #-----------------------TEST D'ACTIVATION DE SESSION-----------
#VÉRIFICATION DE LA SESSION ACTIVE
session_start();
if (!isset($_SESSION['admin'])) {
  #-------COMPOPSANT DE CONNEXION
  include __DIR__.'/html_comp_signin.html';
  ?>
  
<?php

}else {
  /**-----EMBARQUATION DU CONTROLLER DE LA BASE DE DONNÉES -------------- */
  require_once __DIR__.'/../database/controllers/controller.php';
  /**RECUPÉRATION DES INDIVIDUS */
  $all_ind = select_all_individu();
 ?>



  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h3>Menu des intérrogations</h3>
        <ul class="list-group" id="navInterrogation">
  <li class="list-group-item">
    <a class="req-link" href="#req1"  id="R1" class="list-group-link">Req1: Titres des Drames</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req2" id="R2" class="list-group-link">Req2: Films projetés au cinéma Le Fontenelle</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req3" id="R3" class="list-group-link">Req3: Noms et Prénoms des réalisateurs</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req4" id="R4" class="list-group-link">Req4: Noms et Prénoms des acteurs</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req5" id="R5" class="list-group-link">Req5: Films projetés en 2002</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req6" id="R6" class="list-group-link">Req6: Films réalisés par Lars von Trier</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req7" id="R7" class="list-group-link">Req7: Réalisateurs de Drame et Épouvante</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req8" id="R8" class="list-group-link">Req8: Films où Nicole Kidman a joué un rôle</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req9" id="R9" class="list-group-link">Req9: Acteurs qui n'ont pas joué dans des films dramatiques</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req10" id="R10" class="list-group-link">Req10: Nom du Cinéma avec titre du film projeté le 02 Décembre 1990</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req11" id="R11" class="list-group-link">Req11: Les acteurs-titre-année des Drame et Espionnage</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req12" id="R12" class="list-group-link">Req12: Titre et année de parution des films Western ou Policier</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req13" id="R13" class="list-group-link">Req13: Rôles des acteurs du film Dogville</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req14" id="R14" class="list-group-link">Req14: Acteur du rôle d’Helen Remington dans le film Crash</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req15" id="R15" class="list-group-link">Req15: Titre, genre et année des films réalisés par David Cronenberg</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req16" id="R16" class="list-group-link">Req16: Adresse du cinéma Gaumont Wilson</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req17" id="R17" class="list-group-link">Req17: Acteurs dont le nom commence par J, leur rôle et le titre des films</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req18" id="R18" class="list-group-link">Req18: Réalisateur et genre du film Pulp Fiction</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req19" id="R19" class="list-group-link">Req19: Titre, genre et année de parution de tous les films sortis en 2001</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req20" id="R20" class="list-group-link">Req20-rôles des acteurs du film Crash et son année de parution</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req21" id="R21" class="list-group-link">Req21- titre et date de films projetés au cinéma Fontenell ou Espace ciné</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req22" id="R22" class="list-group-link">Req22-Titre et date des films projetés dans les cinemas Gaumont Wilson et Le Renoire</a>
  </li>
  <li class="list-group-item">
    <a class="req-link" href="#req23" id="R23" class="list-group-link">Req23- Informations sur les films projetés chez  Espace ciné et Le renoir</a>
  </li>
</ul>

</div>


<div class="col-md-8">
<h3>Résultats</h3>

<!-- Req 1: titre des drames - Debut -->
<div id="req1">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><h5 class="card-title" id="titre">Titres des Drames</h5></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R1();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td><p class='card-text' id='resultat'>".$row['Titres des Drames']."</p></td>";
                echo "</tr>";
            }
            ?>
        </tbody>                    
    </table>
</div>
    <!--- Req 1: titre des drames  - fin -->
<!-- Req2: films sont projetés au cinéma Le Fontenelle - Debut -->
<div id="req2">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><h5 class="card-title" id="titre">Les films projetés au cinéma Le Fontenelle</h5></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R2();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td><p class='card-text' id='resultat'>".$row['Les films projetés au cinéma Le Fontenelle']."</p></td>";
                echo "</tr>";
            }
            ?>
        </tbody>                    
    </table>
</div>
<!-- Req2: films sont projetés au cinéma Le Fontenelle - fin -->
<!-- Req3: Noms et Prénoms des réalisateurs - Debut -->
<div id="req3">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><h5 class="card-title" id="titre">Noms et Prénoms des réalisateurs</h5></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R3();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td><p class='card-text' id='resultat'>".$row['NOM REALISATEUR']. " " . $row['PRENOM REALISATEUR']."</p></td>";
                echo "</tr>";
            }
            ?>
        </tbody>                    
    </table>
</div>
<!-- Req3: Noms et Prénoms des réalisateurs - fin -->
<!-- Req04-Noms et Prénoms des acteurs - Debut -->
<div id="req4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><h5 class="card-title" id="titre">Noms et Prénoms des acteurs</h5></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R4();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td><p class='card-text' id='resultat'>".$row['NOM ACTEUR']." ".$row['PRENOM ACTEUR']."</p></td>";
                echo "</tr>";
            }
            ?>
        </tbody>                    
    </table>
</div>
<!-- Req04-Noms et Prénoms des acteurs - fin -->
<!-- Req05-Films projetés en 2002 - Debut -->
<div id="req5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><h5 class="card-title" id="titre">Films projetés en 2002</h5></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R5();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td><p class='card-text' id='resultat'>".$row['Films projétés en 2002']."</p></td>";
                echo "</tr>";
            }
            ?>
        </tbody>                    
    </table>
</div>
<!-- Req05-Films projetés en 2002 - fin -->
<!-- Req06-films réalisés par Lars von Trier - Debut -->
<div id="req6">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><h5 class="card-title" id="titre">Les films réalisés par Lars von Trier</h5></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R6();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td><p class='card-text' id='resultat'>".$row['Les films réalises par Lars von Trier']."</p></td>";
                echo "</tr>";
            }
            ?>
        </tbody>                    
    </table>
</div>
<!-- Req06-films réalisés par Lars von Trier - fin -->
<!-- Req07-Réalisateurs de Drame et Épouvante - Debut -->
<div id="req7">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><h5 class="card-title" id="titre">Réalisateurs de Drame et Épouvante</h5></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R7();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td><p class='card-text' id='resultat'>".$row['Nom Realisateurs Epouvante Ou Drame']." ".$row['PRENOM Realisateurs Epouvante Ou Drame']."</p></td>";
                echo "</tr>";
            }
            ?>
        </tbody>                    
    </table>
</div>
<!-- Req07-Réalisateurs de Drame et Épouvante - fin -->
<!-- Req08-Films où Nicole Kidman a joué un rôle - Debut -->
<div id="req8">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><h5 class="card-title" id="titre">Films où Nicole Kidman a joué un rôle</h5></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R8();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td><p class='card-text' id='resultat'>".$row['Les Films ou Nicole Kidman a joue un role']."</p></td>";
                echo "</tr>";
            }
            ?>
        </tbody>                    
    </table>
</div>
<!-- Req08-Films où Nicole Kidman a joué un rôle - fin -->
<!-- Req09-Acteurs qui n'ont pas joué des films dramatiques - Debut -->
<div id="req9">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><h5 class="card-title" id="titre">Acteurs qui n'ont pas joué dans des films dramatiques</h5></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R9();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td><p class='card-text' id='resultat'>".$row['NOM']." ".$row['PRENOM']."</p></td>";
                echo "</tr>";
            }
            ?>
        </tbody>                    
    </table>
</div>
<!-- Req09-Acteurs qui n'ont pas joué des films dramatiques - fin -->
<!-- Req10-Nom du Cinéma avec titre du film projété 02 Décembre 1990 - Debut -->
<div id="req10">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><h5 class="card-title" id="titre">Nom du Cinéma avec titre du film projeté le 02 Décembre 1990</h5></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R10();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td><p class='card-text' id='resultat'>".$row['NOM CINEMA']." - ".$row['TITRE FILM']."</p></td>";
                echo "</tr>";
            }
            ?>
        </tbody>                    
    </table>
</div>
<!-- Req10-Nom du Cinéma avec titre du film projété 02 Décembre 1990 - fin -->
<!-- Req11-les acteurs-titre-année des Drame et Espionnage - Debut -->
<div id="req11">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><h5 class="card-title" id="titre">Acteurs - Titre - Année des films de genre Drame et Espionnage</h5></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R11();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td><p class='card-text' id='resultat'>".$row['NOM ACTEUR']." ".$row['PRENOM ACTEUR']." - ".$row['TITRE FILM']." (".$row['ANNEE DE PARUTION'].")</p></td>";
                echo "</tr>";
            }
            ?>
        </tbody>                    
    </table>
</div>
<!-- Req11-les acteurs-titre-année des Drame et Espionnage - fin -->
<!-- Req12-titre et année de parution des films Western ou Policier - Debut -->
<div id="req12">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><h5 class="card-title" id="titre">Titre et année de parution des films de genre Western ou Policier</h5></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R12();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td><p class='card-text' id='resultat'>".$row['TITRE FILM']." (".$row['ANNEE DE PARUTION'].")</p></td>";
                echo "</tr>";
            }
            ?>
        </tbody>                    
    </table>
</div>
<!-- Req12-titre et année de parution des films Western ou Policier - fin -->
<!-- Req13-rôles des acteurs du film Dogville - Debut -->
<div id="req13">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><h5 class="card-title" id="titre">Rôles des acteurs du film Dogville</h5></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R13();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td><p class='card-text' id='resultat'>".$row['Roles des acteurs du film Dogville']."</p></td>";
                echo "</tr>";
            }
            ?>
        </tbody>                    
    </table>
</div>
<!-- Req13-rôles des acteurs du film Dogville - fin -->
<!-- Req14-acteur du rôle d’Helen Remington dans le film Crash - Debut -->
<div id="req14">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><h5 class="card-title" id="titre">Acteur du rôle d'Helen Remington dans le film Crash</h5></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R14();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td><p class='card-text' id='resultat'>".$row['NOM ACTEUR']." ".$row['PRENOM ACTEUR']."</p></td>";
                echo "</tr>";
            }
            ?>
        </tbody>                    
    </table>
</div>
<!-- Req14-acteur du rôle d’Helen Remington dans le film Crash - fin -->
<!-- Req15- titre, genre et année des films réalisés par David Cronenberg - Debut -->
<div id="req15">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><h5 class="card-title" id="titre">Titre, Genre et Année des films réalisés par David Cronenberg</h5></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R15();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td>".$row['titre']."</td>";
                echo "<td>".$row['genre']."</td>";
                echo "<td>".$row['annee']."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>                    
    </table>
</div>
<!-- Req15- titre, genre et année des films réalisés par David Cronenberg - fin -->
<!-- Req16-Adresse du cinéma Gaumont Wilson - Debut -->
<div id="req16">
    <h5 class="card-title" id="adresse">Adresse du cinéma Gaumont Wilson</h5>
    <p class="card-text" id="resultadresse">
        <?php
        $resultat = R16();
        foreach($resultat as $row) {
            echo $row['Adresse Du Cinema Gaumont Wilson'];
        }
        ?>
    </p>
</div>
<!-- Req16-Adresse du cinéma Gaumont Wilson - fin -->
<!-- Req17-Acteurs dont le nom commence par J - Debut -->
<div id="req17">
    <h5 class="card-title" id="acteurs">Acteurs dont le nom commence par J</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom Acteur</th>
                <th>Prénom Acteur</th>
                <th>Rôle</th>
                <th>Titre Film</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R17();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td>".$row['nomInd']."</td>";
                echo "<td>".$row['prenomInd']."</td>";
                echo "<td>".$row['roleActeur']."</td>";
                echo "<td>".$row['titre']."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Req17-Acteurs dont le nom commence par J - fin -->
<!-- Req18-Réalisateur et genre du film Pulp Fiction - Début -->
<div id="req18">
    <h5 class="card-title" id="realisateur_genre">Réalisateur et genre du film Pulp Fiction</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom Réalisateur</th>
                <th>Prénom Réalisateur</th>
                <th>Genre du Film</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R18();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td>".$row['Nom Realisateur']."</td>";
                echo "<td>".$row['Prenom Realisateur']."</td>";
                echo "<td>".$row['Genre du Film']."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Req18-Réalisateur et genre du film Pulp Fiction - Fin -->
<!-- Req19-Titre, genre et année de parution des films (sauf von Trier) - Début -->
<div id="req19">
    <h5 class="card-title" id="titre_genre_annee">Titre, genre et année de parution des films (sauf von Trier)</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Genre</th>
                <th>Année de parution</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R19();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td>".$row['titre']."</td>";
                echo "<td>".$row['genre']."</td>";
                echo "<td>".$row['annee']."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Req19-Titre, genre et année de parution des films (sauf von Trier) - Fin -->
<!-- Req20-Rôles des acteurs du film Crash et son année de parution - Début -->
<div id="req20">
    <h5 class="card-title" id="roles_crash">Rôles des acteurs du film Crash et son année de parution</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre du film</th>
                <th>Année de parution</th>
                <th>Rôle de l'acteur</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R20();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td>".$row['Titre du Film']."</td>";
                echo "<td>".$row['Annee de Parution']."</td>";
                echo "<td>".$row['Role Acteur']."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Req20-Rôles des acteurs du film Crash et son année de parution - Fin -->
<!-- Req21-Titres et dates des films projetés au cinéma Fontenell ou Espace ciné - Début -->
<div id="req21">
    <h5 class="card-title" id="films_projetes">Titres et dates des films projetés au cinéma Fontenell ou Espace ciné</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre du film</th>
                <th>Date de projection</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R21();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td>".$row['titre']."</td>";
                echo "<td>".$row['annee']."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Req21-Titres et dates des films projetés au cinéma Fontenell ou Espace ciné - Fin -->
<!-- Req22-Titres et dates des films projetés au cinéma Gaumont Wilson et Le Renoir - Début -->
<div id="req22">
    <h5 class="card-title" id="films_projetes">Titres et dates des films projetés au cinéma Gaumont Wilson et Le Renoir</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre du film</th>
                <th>Date de projection</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R22();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td>".$row['titre']."</td>";
                echo "<td>".$row['annee']."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Req22-Titres et dates des films projetés au cinéma Gaumont Wilson et Le Renoir - Fin -->
<!-- Req23-Informations sur les films projetés chez Espace ciné et Le Renoir - Début -->
<div id="req23">
    <h5 class="card-title" id="films_projetes">Informations sur les films projetés chez Espace Ciné et Le Renoir</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Cinéma</th>
                <th>Titre du film</th>
                <th>Année de parution</th>
                <th>Nom réalisateur</th>
                <th>Prénom réalisateur</th>
                <th>Nom acteur</th>
                <th>Prénom acteur</th>
                <th>Rôle acteur</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultat = R23();
            foreach($resultat as $row) {
                echo "<tr>";
                echo "<td>".$row['NOM CINEMA']."</td>";
                echo "<td>".$row['TITRE FILM']."</td>";
                echo "<td>".$row['ANNEE DE PARUTION']."</td>";
                echo "<td>".$row['NOM REALISATEUR']."</td>";
                echo "<td>".$row['PRENOM REALISATEUR']."</td>";
                echo "<td>".$row['NOM ACTEUR']."</td>";
                echo "<td>".$row['PRENOM ACTEUR']."</td>";
                echo "<td>".$row['ROLE ACTEUR']."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Req23-Informations sur les films projetés chez Espace ciné et Le Renoir - Fin -->




</div>
    </div>
  </div>


  <?php 
}
?>
  
  
<?php 
/**-----EMBARQUATION DU PIEDS DES PAGES -------------- */
include __DIR__.'/html_comp_footer.html';

?>