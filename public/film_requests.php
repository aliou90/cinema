<?php 
/**---------------------------------------------------------- */
/**-----TRAITEMENT DES ACTIONS DU BOUTONS DE SUPPRESSION- */
/**----------------------------------------------------------- */
if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
    /**-----EMBARQUATION DU CONTROLLER DE LA BASE DE DONNÉES -------------- */
    require_once __DIR__.'/../database/controllers/controller.php';
       
    

    /**--------CONFIRMATION------------- */
    ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <?php echo "<p class='text-center'>Attention les projections liées à ce cinéma seront aussi supprimés : 
          <a href='film.php?del=".$del_id."&&conf=1'><button class='btn btn-danger'>Confirmer</button></a>
          <a href='film.php?del=".$del_id."&&conf=0'><button class='btn btn-light'>Annuler</button></a></p>"; 
          ?>      
          <a type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
        </div>
    <?php
        
    
}
    /**----------SUPPRESSION OU ANNULATION---------- */
if (isset($_GET['del']) && isset($_GET['conf'])) {
  $del_id = $_GET['del'];
  $conf = $_GET['conf'];

  if ($conf == 1) {
    $msg1 = delete_one_projection_by_film($del_id);
    $msg2 = delete_one_jouer_by_film($del_id);
    $msg3 = delete_one_film($del_id); 


     echo "<script type='text/javascript'>alert(". $msg1.PHP_EOL,$msg2.PHP_EOL,$msg3.PHP_EOL.")</script>";
    header('Location: film.php');

  }else {
    header('Location: film.php');
  }
   
}

// Ajout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupérer les valeurs du formulaire
  $numInd = $_POST["numInd"];
  $titre = $_POST["titre"];
  $genre = $_POST["genre"];
  $annee = $_POST["annee"];
      /**-----EMBARQUATION DU CONTROLLER DE LA BASE DE DONNÉES -------------- */
      require_once '../database/controllers/controller.php';
       

  // Appeler la fonction d'insertion du film
  $filmId = insert_one_film($numInd, $titre, $genre, $annee);
  if ($filmId) {
  ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?php echo "<p class='text-center'> Insertion réussie! ID: ".$filmId." </p>"; 
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
