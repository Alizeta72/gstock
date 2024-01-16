
<?php
      require "../INCLUDE/bd.php";
      require "../FUNCTION/function.php";

      if (isset($_GET['id_vente'])) {
        $id = $_GET['id_vente'];
        deleteEntity("vente",$id, "id_vente");
      }

      require "../INCLUDE/head.php";

      
    ?>

   <!--main container start-->
   <div style="margin: auto;"  class="main-container">
        <div style="padding:90px;" class="cards">

            <div class="dropdown-divider border-green"></div>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="fw-bold mb-0">Liste des Ventes</h4>
                    </div>
                 </div>
            <div class="dropdown-divider bordergreen" ></div>

                <div class="table-responsive">
                
                      <table class="mtable" >
                              <thead style="background-color: #0a2558; color:#fff;">
                                  <tr>
                                      <th>Article</th>
                                      <th>Client</th>
                                      <th>Quantite</th>
                                      <th>Prix</th>
                                      <th>Date</th>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php foreach (get("vente") as $ventes):?>
                                
                                 <tr>
                                  <td><?=$ventes->id_article?></td>
                                  <td><?=$ventes->id_client?></td>
                                  <td><?=number_format($ventes->quantite ,0,',','.')?></td>
                                  <td><?=number_format($ventes->prix ,0,',','.')?></td>
                                  <td><?=$ventes->date_vente?></td>
                                      
                                  </tr>
                                  <?php endforeach ?>
                              </tbody>
                          </table>
                      </div>
            </div>
        </div>
        <!--main container end -->

         <!--pour la pagination -->
       
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


