
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
          <a href='cinema.php?del=".$del_id."&&conf=1'><button class='btn btn-danger'>Confirmer</button></a>
          <a href='cinema.php?del=".$del_id."&&conf=0'><button class='btn btn-light'>Annuler</button></a></p>"; 
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
    $msg1 = delete_one_projection_by_cinema($del_id);
    $msg2 = delete_one_cinema($del_id); 


     echo "<script type='text/javascript'>alert(". $msg1.PHP_EOL,$msg2.PHP_EOL.")</script>";
    header('Location: cinema.php');

  }else {
    header('Location: cinema.php');
  }
   
}

// AJOUT 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Form was submitted via POST method
  $nomCine = $_POST['nomCine'];
  $adresse = $_POST['adresse'];
      /**-----EMBARQUATION DU CONTROLLER DE LA BASE DE DONNÉES -------------- */
      require_once '../database/controllers/controller.php';
  
  // Call the insert_one_cinema function to insert the data into the database
  $msg = insert_one_cinema($nomCine, $adresse);
  
  // Display a success message or handle the result as needed
  if ($msg) {

  ?>
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <?php echo "<p class='text-center'>Insertion réussie. ID du nouveau cinéma: " . $msg."</p>"; 
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
