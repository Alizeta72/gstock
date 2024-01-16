
<?php
     require "../INCLUDE/bd.php";
     require "../FUNCTION/function.php";
     require "../CONFIGURATION/config_produit.php";
     require "../CONFIGURATION/configModif_produit.php";
      
    if (isset($_GET['id_article'])) {
        $id =$_GET['id_article'];
        $article=getEntityById("article",$id,"id_article");
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
                        <h4 class="fw-bold mb-0">Modifier les références du produit</h4>
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

                        <?php foreach($article as $articles):?>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Nom produit</label>
                            <input value="<?=$articles->nom_article?>" type="text" name="nom_article" class="form-control" placeholder="nom produit" />
                          </div>
                        </div>

                         <div class="col-md">
                          <div class="form-floating mb-3">
                             <label for="">Image produit</label>
                            <input value="<?=$articles->image?>" name="image" type="file" class="form-control" placeholder="image produit" />
                          </div>
                        </div>

                        <label for="">Categorie</label>
                        <div class="column">
                            <div class="col-md">
                              <div class="form-floating mb-3">
                              <select name="categorie" id="" class="form-select">
                                    <option value="--">Selectionne la cathégorie du produit</option>
                                    <option <?= !empty($_GET['id_article']) && $articles->categorie == "Carpe" ? "selected" : "" ?> value="Carpe">Carpe</option>
                                    <option <?= !empty($_GET['id_article']) && $articles->categorie == "Capitaine" ? "selected" : "" ?> value="Capitaine">Capitaine</option>
                                </select>
                              </div>
                        </div>
                      </div>

                      <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Quantite</label>
                            <input value="<?=$articles->quantite?>" type="number" name="quantite" class="form-control" placeholder="Quantite" />
                          </div>
                       </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Prix unitaire</label>
                            <input value="<?=$articles->prix_unitaire?>" type="number" name="prix_unitaire" class="form-control" placeholder="Prix unitaire" />
                          </div>
                       </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Date expiration</label>
                            <input value="<?=$articles->date_expiration?>" type="date" name="date_expiration" class="form-control" placeholder="Date expiration" />
                          </div>
                        </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Date fabrication</label>
                            <input value="<?=$articles->date_fabrication?>" type="date" name="date_fabrication" class="form-control" placeholder="Date fabrication" />
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
