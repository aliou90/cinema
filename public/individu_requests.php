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
          <?php echo "<p class='text-center'>Attention les films réaisés et/ou joués par cet individu seront aussi supprimés : 
          <a href='individu.php?del=".$del_id."&&conf=1'><button class='btn btn-danger'>Confirmer</button></a>
          <a href='individu.php?del=".$del_id."&&conf=0'><button class='btn btn-light'>Annuler</button></a></p>";  
          ?>      
          <a type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
    </div>
    <?php
        
    
}
    /**----------SUPPRESSION OU ANNULATIO---------- */
if (isset($_GET['del']) && isset($_GET['conf'])) {
  $del_id = $_GET['del'];
  $conf = $_GET['conf'];

  if ($conf == 1) {
    $msg1 = delete_one_jouer_by_ind($del_id);
    $msg2 = delete_one_film_by_ind($del_id);
    $msg3 = delete_one_individu($del_id); 

    echo "<script type='text/javascript'>alert(". $msg1.PHP_EOL,$msg2.PHP_EOL,$msg3.PHP_EOL.")</script>";
    header('Location: individu.php');

  }else {
    header('Location: individu.php');
  }
   
}

if ($_SERVER["REQUEST_METHOD"] == "POST" & isset($_POST["add_individu"])) {
  $nomInd = $_POST["first"];
  $prenomInd = $_POST["last"];
    /**-----EMBARQUATION DU CONTROLLER DE LA BASE DE DONNÉES -------------- */
    require_once '../database/controllers/controller.php';
  // Appel de la fonction d'insertion
  $result = insert_one_individu($nomInd, $prenomInd);

  if ($result) {

  ?>
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <?php echo "<p class='text-center'>".$result."</p>";  
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
