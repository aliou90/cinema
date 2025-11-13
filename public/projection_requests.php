<?php 
/**---------------------------------------------------------- */
/**-----TRAITEMENT DES ACTIONS DU BOUTONS DE SUPPRESSION- */
/**----------------------------------------------------------- */
if (isset($_GET['del1'])) {
  $del1 = $_GET['del1'];
  $del2 = $_GET['del2'];
  $del3 = $_GET['del3'];
    /**-----EMBARQUATION DU CONTROLLER DE LA BASE DE DONNÉES -------------- */
    require_once '../database/controllers/controller.php';
       
    $msg = delete_one_projection($del1,$del2,$del3);
    
    /**--------ALERT------------- */
    ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <?php echo "<p class='text-center'>".$msg. "</p>"; 
          ?>      
          <a type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
        </div>
    <?php
        
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupérer les valeurs du formulaire
  $numCine = $_POST["numCine"];
  $numFilm = $_POST["numFil"];
  $dateProjection = $_POST["dateProj"];
  /**-----EMBARQUATION DU CONTROLLER DE LA BASE DE DONNÉES -------------- */
  require_once '../database/controllers/controller.php';

  // Appeler la fonction d'insertion de la projection
  $msg = insert_one_projection($numCine, $numFilm, $dateProjection);

  // Afficher le message de succès ou effectuer d'autres actions
  if ($msg) {
    ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <?php echo "<p class='text-center'>".$msg. "</p>"; 
          ?>      
          <a type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
        </div>
    <?php
  }else {
    ?>
    
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?php echo "<p class='text-center'>Aucune action éffectuée.</p>"; 
          ?>      
          <a type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
        </div>
    <?php
  }

}

?>
