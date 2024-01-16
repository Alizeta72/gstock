<?php
      require "../INCLUDE/bd.php";
      require "../FUNCTION/function.php";
      require "../CONFIGURATION/config_produit.php";

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
                        <h4 class="fw-bold mb-0">Nouveau Produit</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <a href="../VIEW/view_produit.php" class="btn btn-danger float-end">
                                <span>Retour</span>
                            </a>
                        </div>
                    </div>
                 </div>
                 <div class="dropdown-divider border-green" ></div>

                 
                    <form method="POST" action="#" class="form" enctype="multipart/form-data">
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
                            <label for="">Réference</label>
                            <input name="nom_article" type="text" class="form-control" placeholder=" Réference du produit" />
                          </div>
                        </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                             <label for="">Image produit</label>
                            <input type="file" name="image" class="form-control" placeholder="image du produit" />
                          </div>
                        </div>

                        <label for="">Categorie</label>
                        <div class="column">
                            <div class="col-md">
                              <div class="form-floating mb-3">
                              <select name="categorie" id="" class="form-select" placeholder="">
                                    <option value="--">Selectionne la cathégorie du produit</option>
                                    <option value="Carpe">Carpe</option>
                                    <option value="Capitaine">Capitaine</option>
                                </select>
                              </div>
                        </div>
                      </div>
                       
                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Quantite</label>
                            <input name="quantite" type="number" class="form-control" placeholder="Quantite" />
                          </div>
                        </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Prix unitaire</label>
                            <input name="prix_unitaire" type="number" class="form-control" placeholder="Prix unitaire" />
                          </div>
                        </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Date expiration</label>
                            <input name="date_expiration" type="date" class="form-control" placeholder="Date expiration" />
                          </div>
                        </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Date fabrication</label>
                            <input name="date_fabrication" type="date" class="form-control" placeholder="Date fabrication" />
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




