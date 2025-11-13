<?php 
/**---------------------------------------------------------- */
/**-----TRAITEMENT DES ACTIONS DU BOUTONS DE SUPPRESSION- */
/**----------------------------------------------------------- */
if (isset($_GET['del1'])) {
  $del1 = $_GET['del1'];
  $del2 = $_GET['del2'];
    /**-----EMBARQUATION DU CONTROLLER DE LA BASE DE DONNÉES -------------- */
    require_once __DIR__.'/../database/controllers/controller.php';
       
    $msg = delete_one_jouer($del1,$del2);
    
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
  $numInd = $_POST["numInd"];
  $numFilm = $_POST["numFilm"];
  $roleActeur = $_POST["role"];
  /**-----EMBARQUATION DU CONTROLLER DE LA BASE DE DONNÉES -------------- */
  require_once '../database/controllers/controller.php';

  // Appeler la fonction d'insertion du lien jouer
  $msg = insert_one_jouer($numInd, $numFilm, $roleActeur);

  // Afficher le message de succès ou effectuer d'autres actions
  if ($msg) {
    ?>
    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
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
