
<?php  
/**-----EMBARQUATION DE L'ENTÊTE DES PAGES -------------- */
 include __DIR__.'/html_comp_header.html'; 
    /**-----EMBARQUATION DU CONTROLLER DE LA BASE DE DONNÉES -------------- */
    require_once __DIR__.'/../database/controllers/controller.php';
?>

<?php   /**-----Login -------------- */ ?>
<?php

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs des champs
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Effectuer les vérifications et validations nécessaires
    $result = login($email, $password);

    // Vérifier les informations de connexion
    if ($result) {
      // Connexion réussie, rediriger l'utilisateur vers une autre page
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo "<p class='text-center'> Vous êtes connectés! </p>"; 
            ?>      
            <a type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
          </div>
      <?php
      session_start();
      $_SESSION['admin'] = $email;
    } else {
      // Mauvaises informations de connexion, afficher un message d'erreur
      ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?php echo "<p class='text-center'>Email ou mot de passe incorrecte. Vérifiez votre mot de passe et réessayez.</p>"; 
          ?>      
          <a type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
        </div>
    <?php
    }
  }
?>


<?php
  /**-----EMBARQUATION CORPS DE L'INDEX -------------- */
 include __DIR__.'/html_comp_welcome.html'; ?>


<?php 
/**-----EMBARQUATION DU PIEDS DES PAGES -------------- */
include __DIR__.'/html_comp_footer.html';
?>

