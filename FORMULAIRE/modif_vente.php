<?php
      require "../INCLUDE/bd.php";
      require "../FUNCTION/function.php";
      require "../CONFIGURATION/configModif_vente.php";

      
    if (isset($_GET['id_vente'])) {
         $id =$_GET['id_vente'];
         $ventes=getEntityById("vente",$id,"id_vente");
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
                        <h4 class="fw-bold mb-0">Modifier les détails d'une vente</h4>
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

                    <?php foreach($ventes as $vente):?>

                   <label for="">Articles</label>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <select name="article" id="" class="form-select">
                                    <?php foreach(get("article") as $articles): ?>
                                        <option value="<?=$articles->id_article?>"><?=$articles->nom_article ?> <?=$articles->quantite?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <label for="">Clients</label>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <select name="client" id="" class="form-select">
                                    <?php foreach(get("client") as $clients): ?>
                                        <option value="<?=$clients->id_client?>"><?=$clients->nom ?> <?=$clients->prenom ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Quantite</label>
                            <input value="<?=$vente->quantite?>" name="qte" type="number" class="form-control" placeholder="Veuillez saisir la quantite de vente" />
                          </div>
                        </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Prix</label>
                            <input value="<?=$vente->prix?>" name="prix" type="number" class="form-control" placeholder="Veuillez saisir le Prix de vente" />
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

    <script src="../JS/app.js"></script>
    <script src="../JS/bootstrap.bundle.min.js"></script>
    <script src="../JS/datatables.min.js"></script>
    <script src="../JS/popper.min.js"></script>

    <?php
        require "../INCLUDE/footer.php";
        
    ?>
