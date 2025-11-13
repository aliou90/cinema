

<?php  
/**-----EMBARQUATION DE L'ENTÊTE DES PAGES -------------- */
 include __DIR__.'/html_comp_header.html'; 
 include __DIR__.'/film_requests.php';
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
      $all_film = select_all_film();
 ?>

  <div class="py-5 bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center text-uppercase">
          <h2 class="">FILMS</h2>
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
                  <table class="table table-dark text-left">
                    <thead>
                      <tr>
                        <th scope="col">Identifiant du film</th>
                        <th scope="col">Identifiant du réalisateur</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Année</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      /**-----AFFICHAGE  -------------- */                     
                      foreach ($all_film as $all) :                        
                        ?>
                      <tr>
                        <td scope="row"><?php echo $all[0]; ?></td>
                        <td><?php echo $all['numInd'].' - '. $all['prenomInd']. ' '. $all['numInd']; ?></td>
                        <td><?php echo $all[2]; ?></td>
                        <td><?php echo $all[3]; ?></td>
                        <td><?php echo $all[4]; ?></td>
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
                        <th scope="col">Numéro du film</th>
                        <th scope="col">Identifiant du réalisateur (individu)</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Année</th>
                        <th scope="col" colspan="2">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      /**-----AFFICHAGE  -------------- */                     
                      foreach ($all_film as $all) :                        
                        ?>
                      <tr class="table-light">
                      <td scope="row"><?php echo $all[0]; ?></td>
                        <td><?php echo $all['numInd'].' - '. $all['prenomInd']. ' '. $all['numInd']; ?></td>
                        <td><?php echo $all[2]; ?></td>
                        <td><?php echo $all[3]; ?></td>
                        <td><?php echo $all[4]; ?></td>
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
                                    <label for="validationServer01" class="form-label">ID du réalisateur (individu)</label>
                                    <div class="form-group">
                                      <select class="form-control" name="numInd" id="numInd">
                                        <option>1</option>
                                      </select>
                                    </div>                    
                                  </div>
                                  <div class="col-md-6">
                                    <label for="validationServer02" class="form-label">Titre du film</label>
                                    <input type="text" class="form-control" id="validationServer02" required="">
                                  </div>
                                  <div class="col-md-6">
                                    <label for="validationServer01" class="form-label">GENRE</label>
                                    <div class="form-group">
                                      <select class="form-control" name="genre" id="genre">
                                        <option>Drame</option>
                                        <option>Épouvante</option>
                                        <option>Western</option>
                                        <option>Espionnage</option>
                                        <option>Policier</option>
                                      </select>
                                    </div>                    
                                  </div>
                                  <div class="col-md-6">
                                    <label for="validationServer01" class="form-label">ANNÉE</label>
                                    <div class="form-group">
                                      <select class="form-control" name="genre" id="genre">
                                        <option>1960</option>
                                        <option>1961</option>
                                        <option>...</option>
                                        <option>2002</option>
                                      </select>
                                    </div>                    
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
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu">
                            <a href="film.php?del=<?php echo $all[0]?>" class="dropdown-item">Confirmer <i class="fa fa-trash"></i></a>
                          </div>
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
                <div class="tab-pane fade bg-dark" id="tabthree" role="tabpanel">
                  <form action="film.php" method="post" class="row g-3">
                    <div class="col-md-12">
                      <h2 class="title"> Ajouter un nouveau film </h2>
                    </div>
                    <div class="col-md-6">
                      <label for="validationServer01" class="form-label">Identifiant du réalisateur (individu)</label>
                      <div class="form-group">
                        <select class="form-control" name="numInd" id="numInd">
                        <?php 
                          $ids = select_individu_ids();
                        ?>
                          <?php foreach($ids as $id): ?>
                            <option value="<?= $id[0]?>"><?= $id[0] .'- '. $id[1].' '. $id[2] ?></option>
                          <?php endforeach?>
                        </select>
                      </div>                    
                    </div>
                    <div class="col-md-6">
                      <label for="validationServer02" class="form-label">Titre du film</label>
                      <input type="text" class="form-control" name="titre" id="validationServer02" required="">
                    </div>
                    <div class="col-md-6">
                      <label for="validationServer01" class="form-label">GENRE</label>
                      <div class="form-group">
                        <select class="form-control" name="genre" id="genre">
                          <option>Drame</option>
                          <option>Épouvante</option>
                          <option>Western</option>
                          <option>Espionnage</option>
                          <option>Policier</option>
                        </select>
                      </div>                    
                    </div>
                    <div class="col-md-6">
                      <label for="validationServer01" class="form-label">ANNÉE</label>
                      <div class="form-group">
                      <?php
                        $currentYear = date("Y"); // Récupérer l'année courante

                        echo '<select class="form-control" name="annee" id="annee">';
                        for ($year = 1960; $year <= $currentYear; $year++) {
                            echo '<option value='.$year.'>' . $year . '</option>';
                        }
                        echo '</select>';
                      ?>

                      </div>                    
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
