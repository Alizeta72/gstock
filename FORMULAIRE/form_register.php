<?php
      require "../INCLUDE/bd.php";
      require "../FUNCTION/function.php";
      require "../CONFIGURATION/config_register.php";

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
                        <h4 class="fw-bold mb-0">Nouveau utilisateur</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <a href="../VIEW/view_utilisateur.php" class="btn btn-danger float-end">
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

                     <label for="">Rôle</label>
                     <div class="col-md">
                        <div class="form-floating mb-3">
                           <select name="role" class="form-select" >
                              <option value="---">Selectionner le rôle de l'utilisateur</option>
                              <option value="user">User</option>
                              <option value="admin">Admin</option>
                           </select>
                        </div>
                     </div>
                  
                     <div class="col-md">
                        <div class="form-floating mb-3">
                           <label for="">Nom utilisateur</label>
                           <input type="text" name="username" class="form-control" required placeholder="Veuillez saisir le nom">
                        </div>
                     </div>

                     <div class="col-md">
                        <div class="form-floating mb-3">
                           <label for="">Mot de passe</label>
                           <input type="password" name="password" class="form-control" required placeholder="Veuillez saisir le mot de passe">
                        </div>
                     </div>

                     <div class="col-md">
                        <div class="form-floating mb-3">
                           <label for="">Nom complet</label>
                           <input type="text" name="name" class="form-control" required placeholder="Veuillez saisir le nom de l'utilisateur">
                        </div>
                     </div>

                     <div class="col-md">
                        <div class="form-floating mb-3">
                           <label for="">Email</label>
                           <input type="email" name="email" class="form-control" required placeholder="Veuillez saisir l'email">
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
