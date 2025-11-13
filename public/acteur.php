
<?php  
/**-----EMBARQUATION DE L'ENTÊTE DES PAGES -------------- */
 include __DIR__.'/html_comp_header.html';
 include __DIR__.'/acteur_requests.php'; 
?>


<?php  
#TEST D'ACTIVATION DE SESSION
session_start();


#VÉRIFICATION DE LA SESSION ACTIVE
if (!isset($_SESSION['admin'])) {
  #-------COMPOPSANT DE CONNEXION
  include __DIR__.'/html_comp_signin.html';
?>
  
<?php

}else {
      /**-----EMBARQUATION DU CONTROLLER DE LA BASE DE DONNÉES -------------- */

      require_once __DIR__.'/../database/controllers/controller.php';
      /**RECUPÉRATION DES DONNÉES DE LA BASE */
      $all_actors = select_all_jouer();
 ?>

  <div class="py-5 bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center text-uppercase">
          <h2 class="">ACTEURS</h2>
          <div class="card text-center">
            <div class="card-header text-secondary bg-light">
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
                  <table class="table table-dark text-left">
                    <thead>
                      <tr>
                        <th scope="col">Identifiant de l'acteur (individu)</th>
                        <th scope="col">Numéro du film</th>
                        <th scope="col">Rôle de l'acteur</th>
                      </tr>
                    </thead>
                    <tbody class="">
                      <tr>
                        <?php                      
                         /**-----AFFICHAGE  -------------- */                     
                        foreach ($all_actors as $all) :                        
                        ?>
                        <td scope="row"><?php echo $all['numInd'].' - '.$all['prenomInd'].' '.$all['nomInd']; ?></td>
                        <td><?php echo $all['numFilm'].' - '.$all['titre']; ?></td>
                        <td><?php echo $all[2]; ?></td>
                      </tr>
                      <?php
                      /**-----FIN AFFICHAGE  -------------- */
                      endforeach;                        
                        ?>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade bg-secondary text-left" id="tabtwo" role="tabpanel">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Identifiant de l'acteur (individu)</th>
                        <th scope="col">Numéro du film</th>
                        <th scope="col">Rôle de l'acteur</th>
                        <th scope="col" colspan="2">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php                      
                         /**-----AFFICHAGE  -------------- */                     
                        foreach ($all_actors as $all) :                        
                        ?>
                      <tr class="table-light">
                        <td scope="row"><?php echo $all['numInd'].' - '.$all['prenomInd'].' '.$all['nomInd']; ?></td>
                        <td><?php echo $all['numFilm'].' - '.$all['titre']; ?></td>
                        <td><?php echo $all[2]; ?></td>
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
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="" class="">ID de l'acteur</label>
                                      <select class="form-control name="" id="numInd">
                                        <option selected>1</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <label for="validationServer02" class="form-label">Numéro du film</label>
                                    <div class="form-group">
                                      <select class="form-control" name="" id="numFil">
                                        <option>2</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <label for="validationServer02" class="form-label">Rôle de l'acteur</label>
                                    <input type="text" class="form-control is-valid" id="validationServer02" required="">
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
                          </button>
                          <span class="dropdown-toggle-split"></span>
                          <ul class="dropdown-menu">
                            <li><a href="acteur.php?del1=<?php echo $all[0]?>&&del2=<?php echo $all[1]?>" class="dropdown-item">Confirmer <i class="fa fa-trash"></i></a></li>
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
                <div class="form group tab-pane fade bg-secondary" id="tabthree" role="tabpanel">
                  <form action="acteur.php" method="post" class="row g-3">
                    <div class="col-md-12">
                      <h2 class="title bg-success"> Ajouter un nouvel acteur </h2>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="" class="">Identifiant de l'acteur</label>
                        <select class="form-control" name="numInd" id="numInd">
                        <?php 
                            $ids = select_individu_ids();
                          ?>
                          <?php foreach($ids as $id): ?>
                            <option value="<?= $id[0] ?>"><?= $id[0] .'- '. $id[1].' '. $id[2] ?></option>
                          <?php endforeach?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="validationServer02" class="form-label">Numéro du film</label>
                      <div class="form-group">
                        <select class="form-control" name="numFilm" id="numFilm">
                        <?php 
                            $ids = select_film_ids();
                          ?>
                          <?php foreach($ids as $id): ?>
                            <option value="<?= $id[0] ?>"><?= $id[0] .' - '. $id[1].' - '. $id[2].' - '. $id[3] ?></option>
                          <?php endforeach?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="validationServer02" class="form-label">Rôle de l'acteur</label>
                      <input type="text" class="form-control" name="role" id="validationServer02" required="">
                    </div>
                    <div class="col">
                      <button class="btn btn-success" type="submit">Enregistrer</button>
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
