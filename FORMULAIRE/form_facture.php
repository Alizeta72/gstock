<?php
      require "../INCLUDE/bd.php";
      require "../FUNCTION/function.php";
      require "../CONFIGURATION/config_facture.php";

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
                        <h4 class="fw-bold mb-0">Nouvelle facture</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <a href="../VIEW/view_facture.php" class="btn btn-danger float-end">
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

                        
                        <label for="">Vente</label>
                        <div class="column">
                            <div class="col-md">
                              <div class="form-floating mb-3">
                                <select name="vente" class="form-select" id="">
                                <option value="---">Selectionner un vente</option>
                                    <?php foreach(get("vente") as $ventes): ?>
                                        <option value="<?=$ventes->id_vente?>"><?=$ventes->id_vente?> </option>
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
                            <label for="">N°facture</label>
                            <input name="numero_F" type="text" class="form-control" placeholder="numero de la facture" />
                          </div>
                        </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Date </label>
                            <input name="date_F" type="date" class="form-control" placeholder="Date d'etablissement de la facture" />
                          </div>
                        </div>

                        <label for="">Mode paiement</label>
                        <div class="column">
                            <div class="col-md">
                              <div class="form-floating mb-3">
                              <select name="mode_p" id="" class="form-select">
                                    <option value="---">Selectionner le mode de paiement</option>
                                    <option value="Credit">Credit</option>
                                    <option value="Liquide">Liquide</option>
                                    <option value="Virement">Virement</option>
                                    <option value=">Orange Money">Orange Money</option>
                                </select>
                              </div>
                        </div>
                      </div>

                        <div class="col-md">
                          <div class="form-floating mb-3">
                            <label for="">Montant</label>
                            <input name="montant" type="number" class="form-control" placeholder="Montant" />
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




