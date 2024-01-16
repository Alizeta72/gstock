
<?php
      session_start();

      require "../INCLUDE/bd.php";
      require "../FUNCTION/function.php";

      if (isset($_GET['id_article'])) {
        $id = $_GET['id_article'];
        deleteEntity("article",$id, "id_article");
      }

       //pagination
       if (isset($_GET['data'])) {
        $data = $_GET['data'];
        echo "La valeur de data est : ".$data;
      }

      $byPage = 5;
      $count =getTotal("client");
      $page = ceil($count / $byPage);
      $currentPage = $_GET['page'] ?? 1;

      if(isset($_GET['next'])) {
        if($currentPage <= $page) {
            $currentPage ++;
          }
      }

      if(isset($_GET['pre'])) {
        if($currentPage >= $page) {
            $currentPage --;
          }
      }

      if ($currentPage > $page) {
        $_SESSION['pag'] = "Cette page n'existe pas";
      }


      require "../INCLUDE/head.php";
      require "../INCLUDE/Sidbar.php";
      require "../INCLUDE/Nav_bar.php";

    ?>

   <!--main container start-->
   <div style="margin: auto;"  class="main-container">
        <div style="padding:90px;" class="cards">

            <div class="dropdown-divider border-green"></div>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="fw-bold mb-0">Liste des produits</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <a href="../FORMULAIRE/form_produit.php" class="btn btn-primary btn-sm me-3"><i class="fa-solid fa-plus"></i>
                                <span>Ajouter</span>
                            </a>
                        </div>
                    </div>
                 </div>
            <div class="dropdown-divider bordergreen" ></div>

                <div class="table-responsive">
                <?php if(isset($_SESSION['pag'])) :?>
                    <div class="alert alert-danger">
                        <?=$_SESSION['pag']?>
                    </div>
                   <?php elseif(!isset($_SESSION['pag'])) :?>
                      <table class="table table-striped" >
                              <thead style="background-color: #0a2558; color:#fff;">
                              <tr>
                                    <th>Réference</th>
                                    <th>Categorie</th>
                                    <th>Quantite</th>
                                    <th>Prix unitaire</th>
                                    <th>Date expiration</th>
                                    <th>Date fabrication</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php foreach (pagination("article",$byPage,$currentPage) as $articles):?>
                             
                                    <tr>
                                    <td><?=$articles->nom_article?></td>
                                    <td><?=$articles->categorie?></td>
                                    <td><?=$articles->quantite?></td>
                                    <td><?=$articles->prix_unitaire?></td>
                                    <td><?=$articles->date_expiration?></td>
                                    <td><img src=""../IMAGE/<?=$articles->image?>" alt="Girl in a jacket" width="50" height="50"></td>
                                    <td><?=$articles->date_fabrication?></td>
                                    <td>
                                      <a href="../FORMULAIRE/modif_produit.php?id_article=<?=$articles->id_article?>"><i class="fa-regular fa-pen-to-square btn-sm"  style="font-size:16pt"></i></a>
                                      <a onclick="return confirm('Etes vous sûr de vouloir supprimer cette ligne ? Cette action est irreversible!')" href="view_produit.php?id_article=<?=$articles->id_article?>"><i class="fa-solid fa-trash-can  btn-sm" style="color:red; font-size:16pt"></i></a>
                                    </td>
                                    </tr>
                                <?php endforeach ?>
                              </tbody>
                          </table>
                          <?php endif ?>
                          <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="?pre">Previous</a></li>
                                <?php for($i=1; $i <= $page; $i++):?>
                                    <li class="page-item <?php if($i == $currentPage):?> <?="active"?> <?php endif ?>"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
                                <?php endfor ?>
                                <li class="page-item"><a class="page-link" href="?next">Next</a></li>
                          </ul>
                      </div>
            </div>
        </div>
        <!--main container end -->

         <!--pour la pagination -->
         <?php
            unset($_SESSION['pag']);
        ?>

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


