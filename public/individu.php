<?php  
/**-----EMBARQUATION DE L'ENTÊTE DES PAGES -------------- */
 include __DIR__.'/html_comp_header.html'; 
 include __DIR__.'/individu_requests.php';
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


<div class="py-5 bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center text-uppercase">
          <h2 class="">individus</h2>
          <div class="card text-center">
            <div class="card-header text-secondary">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" data-target="#tabone" href="">Afficher</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="" data-toggle="tab" data-target="#tabtwo">Modifier/Supprimer</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " data-toggle="tab" data-target="#tabthree" href="">Ajouter</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content mt-2">
                <div class="tab-pane fade show active fade " id="tabone" role="tabpanel">
                  <table class="table table-dark text-left ">
                    <thead>
                      <tr>
                        <th scope="col">Identifiant de l'individu</th>
                        <th scope="col">Prénom de l'individu</th>
                        <th scope="col">Nom de l'individu</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      /**-----AFFICHAGE  -------------- */                     
                      foreach ($all_ind as $all) :                        
                        ?>
                      <tr>
                        <td scope="row"><?php echo $all[0]; ?></td>
                        <td><?php echo $all[1]; ?></td>
                        <td><?php echo $all[2];?></td>
                      </tr>
                      <?php
                      /**-----FIN AFFICHAGE  -------------- */
                      endforeach;                        
                        ?>
                    </tbody>
                  </table>
                </div>

                
            <?php  
            /**-----MANIPULATION (AJOUTER/SUPPRIMER)-------------- */
            
            ?>
                <div class="tab-pane fade bg-secondary text-left" id="tabtwo" role="tabpanel">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Identifiant</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col" colspan="2">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      /**-----AFFICHAGE  -------------- */                     
                      foreach ($all_ind as $all) :                        
                        ?>
                      <tr class="table-light">
                      <td scope="row"><?php echo $all[0]; ?></td>
                        <td><?php echo $all[1]; ?></td>
                        <td><?php echo $all[2];?></td>
                        <td>
                                                  <!-- Button trigger modal -->
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
                            Modifier
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Modifier les informations</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <form class="row g-3">
                                  <div class="col-md-6">
                                    <label for="validationServer01" class="form-label">Nom</label>
                                    <input type="text" class="form-control " id="validationServer01" required="">
                                    <div class="valid-feedback"> Entrer le nom de l'individu </div>
                                  </div>
                                  <div class="col-md-6">
                                    <label for="validationServer02" class="form-label">Prénom</label>
                                    <input type="text" class="form-control " id="validationServer02" required="">
                                    <div class="valid-feedback"> Entrer le prénom de l'individu </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                  <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>                        
                        </td>
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Supprimer
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="individu.php?del=<?php echo $all[0]?>" class="dropdown-item">Confirmer <i class="fa fa-trash"></i></a></li>
                          </ul>
                        </div>

                        </td>
                      </tr>
                      <?php
                      /**-----FIN AFFICHAGE  -------------- */
                      endforeach;                        
                        ?>
                    </tbody>
                  </table>
                </div>



                <?php  
            /**-----AJOUT -------------- */
            
            ?>
                <div class="tab-pane fade" id="tabthree" role="tabpanel">
                  <form action="individu.php" method="post" class="row g-3">
                    <div class="col-md-12">
                      <h2 class="title bg-dark"> Ajouter un nouvel individu </h2>
                    </div>
                    <div class="col-md-6">
                      <label for="validationServer01" class="form-label">Nom</label>
                      <input type="text" class="form-control " id="validationServer01" name="first" required="">
                      <div class="valid-feedback"> Entrer le nom de l'individu </div>
                    </div>
                    <div class="col-md-6">
                      <label for="validationServer02" class="form-label">Prénom</label>
                      <input type="text" class="form-control" name="last" id="validationServer02" required="">
                      <div class="valid-feedback"> Entrer le prénom de l'individu </div>
                    </div>
                    <div class="col">
                      <input type="hidden" name="add_individu" value="cc">
                      <button class="btn btn-success" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir enregistrer ?')">Enregistrer</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
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

