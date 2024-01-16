<?php
      require "../INCLUDE/bd.php";
      require "../FUNCTION/function.php";
      require "../CONFIGURATION/config_achat.php";

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
                        <h4 class="fw-bold mb-0">Nouveau achat</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <a href="../VIEW/view_achat.php" class="btn btn-danger float-end">
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


                        <label for="">Fournisseur</label>
                        <div class="column">
                            <div class="col-md">
                              <div class="form-floating mb-3">
                                <select name="fournisseur" class="form-select" id="">
                                <option value="---">Selectionner un fournisseur</option>
                                    <?php foreach(get("fournisseur") as $fournisseurs): ?>
                                        <option value="<?=$fournisseurs->id_fournisseur?>"><?=$fournisseurs->nom?> <?=$fournisseurs->prenom?></option>
                                    <?php endforeach ?>
                                </select>
                              </div>
                            </div>
                        </div>

                        <label for="">Article</label>
                        <div class="column">
                            <div class="col-md">
                              <div class="form-floating mb-3">
                                <select name="article" class="form-select" id="">
                                <option value="---">Selectionner un article</option>
                                    <?php foreach(get("article") as $articles): ?>
                                        <option value="<?=$articles->id_article?>"><?=$articles->nom_article?></option>
                                    <?php endforeach ?>
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
                            <label for="">Date d'achat</label>
                            <input name="date_achat" type="date" class="form-control" placeholder="Date d'achat" />
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




