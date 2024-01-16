
<?php
      require "../INCLUDE/bd.php";
      require "../FUNCTION/function.php";
      require "../CONFIGURATION/config_vente.php";

    
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
                        <h4 class="fw-bold mb-0">Effecter une nouvelle vente</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <a href="../VIEW/view_vente.php" class="btn btn-danger float-end">
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
                       
                        <label for="">Article</label>
                        <div class="column">
                            <div class="col-md">
                              <div class="form-floating mb-3">
                                <select name="article" class="form-select" id="">
                                <option value="---">Selectionner un article</option>
                                    <?php foreach(get("article") as $articles): ?>
                                        <option prix="<?=$articles->prix_unitaire?>" value="<?=$articles->id_article?>"><?=$articles->nom_article?> <?=$articles->quantite?></option>
                                    <?php endforeach ?>
                                </select>
                              </div>
                            </div>
                        </div>
                        
                        <label for="">Clients</label>
                        <div class="column">
                            <div class="col-md">
                              <div class="form-floating mb-3">
                                <select name="client" class="form-select" id="">
                                <option value="---">Selectionner un client</option>
                                    <?php foreach(get("client") as $clients): ?>
                                        <option value="<?=$clients->id_client?>"><?=$clients->nom?> <?=$clients->prenom ?></option>
                                    <?php endforeach ?>
                                </select>
                              </div>
                            </div>
                        </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                                <label for="">Quantite</label>
                                <input id="quantite" name="qte" type="number"  class="form-control" placeholder="Quantite" />
                            </div>
                        </div>

                        <div class="col-md">
                           <div class="form-floating mb-3">
                                <label for="">Prix</label>
                                <input id="price" name="prix" type="number" class="form-control" placeholder="prix" />
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

    <script src="../JS/app.js"></script>
    <script src="../JS/bootstrap.bundle.min.js"></script>
    <script src="../JS/datatables.min.js"></script>
    <script src="../JS/popper.min.js"></script>

    <?php
        require "../INCLUDE/footer.php";
        
    ?>

