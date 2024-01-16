<?php
      require "../INCLUDE/bd.php";
      require "../FUNCTION/function.php";
      require "../CONFIGURATION/configModif_client.php";
      require "../CONFIGURATION/config_client.php";

      
    if (isset($_GET['id_client'])) {
         $id =$_GET['id_client'];
         $clients=getEntityById("client",$id,"id_client");
    }


    require "../INCLUDE/head.php";
    require "../INCLUDE/Sidbar.php";
    require "../INCLUDE/Nav_bar.php";


?>


  <!--main container start-->
  <div style="margin: auto;"  class="main-container">
            <div style="padding: 90px;"  class="cards">

            <div class="dropdown-divider border-green" ></div>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="fw-bold mb-0">Modifier les références d'un client</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <a href="../VIEW/view_client.php" class="btn btn-danger float-end">
                                <span>Retour</span>
                            </a>
                        </div>
                    </div>
                 </div>
                 <div class="dropdown-divider border-green" ></div>

                 
                    <form method="POST" action="#" class="form">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                    <?php if(!empty($message_success)):?>
                                        <div class="alert alert-success">
                                            <?=$message_success?>
                                        </div>
                                    <?php endif ?>
                                    <?php if(isset($message)):?>
                                            <div class="alert alert-danger">
                                                <?=$message?>
                                            </div>
                                    <?php endif ?>
                                </div>
                        </div>

                        <?php foreach($clients as $client):?>  
                       
                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Nom</label>
                            <input value="<?=$client->nom?>" type="text" name="nom" class="form-control" placeholder="Veuillez saisir le nom du client" />
                          </div>
                        </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Prenom</label>
                            <input value="<?=$client->prenom?>" type="text" name="prenom" class="form-control" placeholder="Veuillez saisir le prenom du client" />
                          </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <label for="">Adresse</label>
                                <input value="<?=$client->adresse?>" name="adresse" type="text" class="form-control" placeholder="Veuillez saisir l'adresse du client " />
                             </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating mb-3">
                            <label for="">Email</label>
                                <input value="<?=$client->email?>" type="text" name="email"  class="form-control" placeholder="Veuillez saisir l'email du client " />
                             </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating mb-3">
                            <label for="">Téléphone</label>
                                <input value="<?=$client->telephone?>" type="number" name="telephone" class="form-control" placeholder="Veuillez saisir le N°telephone du client " />
                             </div>
                        </div>

                        <label for="">Type</label>
                        <div class="column">
                            <div class="col-md">
                              <div class="form-floating mb-3">
                              <select name="sexe" id="" class="form-select">
                                    <option <?= !empty($_GET['id_client']) && $client->sexe  == "M" ? "selected" : "" ?> value="H">Homme</option>
                                    <option <?= !empty($_GET['id_client']) && $client->sexe == "F" ? "selected" : "" ?> value="F">Femme</option>
                                </select>
                              </div>
                        </div>
                      </div>

                      <?php endforeach ?>
                      <button name="modif" type="submit" class="btn btn-primary">Enregistrer</i></button>
                     </form>


         
        
            </div>
        </div>
        <!--main container end -->


        </section>
        <?php
          require "../INCLUDE/js.php";
        ?>

  
    <script src="../JS/bootstrap.bundle.min.js"></script>
    <script src="../JS/datatables.min.js"></script>
    <script src="../JS/popper.min.js"></script>

    <?php
        require "../INCLUDE/footer.php";
        
    ?>
