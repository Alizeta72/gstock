<?php
      require "../INCLUDE/bd.php";
      require "../FUNCTION/function.php";
      require "../CONFIGURATION/config_client.php";

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
                        <h4 class="fw-bold mb-0">Nouveau client</h4>
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
                       
                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Nom</label>
                            <input name="nom" type="text" class="form-control" placeholder="Veuillez saisir le nom du client" />
                          </div>
                        </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Prenom</label>
                            <input name="prenom" type="text" class="form-control" placeholder="Veuillez saisir le prenom du client" />
                          </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <label for="">Adresse</label>
                                <input name="adresse" type="text" class="form-control" placeholder="Veuillez saisir l'adresse du client " />
                             </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating mb-3">
                            <label for="">Email</label>
                                <input name="email" type="text" class="form-control" placeholder="Veuillez saisir l'email du client " />
                             </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating mb-3">
                            <label for="">Téléphone</label>
                                <input name="telephone" type="number" class="form-control" placeholder="Veuillez saisir le N°telephone du client " />
                             </div>
                        </div>

                        <label for="">Type</label>
                        <div class="column">
                            <div class="col-md">
                              <div class="form-floating mb-3">
                              <select name="sexe" id="" class="form-select">
                                    <option value="---">Selectionner le sexe</option>
                                    <option value="M">Homme</option>
                                    <option value="F">Femme</option>
                                </select>
                              </div>
                        </div>
                      </div>
                        <button name="okay" type="submit" class="btn btn-primary">Valider</button>
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
