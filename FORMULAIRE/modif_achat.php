
<?php
     require "../INCLUDE/bd.php";
     require "../FUNCTION/function.php";
     require "../CONFIGURATION/config_achat.php";
     require "../CONFIGURATION/configModif_achat.php";
      
    if (isset($_GET['id_achat'])) {
        $id =$_GET['id_achat'];
        $achat=getEntityById("achat",$id,"id_achat");
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
                        <h4 class="fw-bold mb-0">Modifier les références de l'achat</h4>
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

                        <?php foreach($achat as $achats):?>

                        <label for="">Articles</label>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <select name="article" id="" class="form-select">
                                    <?php foreach(get("article") as $articles): ?>
                                        <option value="<?=$articles->id_article?>"><?=$articles->nom_article ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <label for="">Fournisseurs</label>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <select name="fournisseur" id="" class="form-select">
                                    <?php foreach(get("fournisseur") as $fournisseurs): ?>
                                        <option value="<?=$fournisseurs->id_fournisseur?>"><?=$fournisseurs->nom ?> <?=$fournisseurs->prenom ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                      <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Quantite</label>
                            <input value="<?=$achats->quantite?>" type="number" name="quantite" class="form-control" placeholder="Quantite" />
                          </div>
                       </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Prix unitaire</label>
                            <input value="<?=$achats->prix?>" type="number" name="prix_achat" class="form-control" placeholder="Prix unitaire" />
                          </div>
                       </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Date d'achat </label>
                            <input value="<?=$achats->date_achat?>" type="date" name="date_achat" class="form-control" placeholder="Date d'achat" />
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
