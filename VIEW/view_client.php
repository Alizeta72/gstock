
<?php
      session_start();

      require "../INCLUDE/bd.php";
      require "../FUNCTION/function.php";

      if (isset($_GET['id_client'])) {
        $id = $_GET['id_client'];
        deleteEntity("client",$id, "id_client");
      }

     //pagination

     define("ITEM_PER_PAGE", 5);
     define("ITEM_PER_PAGE_SEARCH", 4);

     $stmt = $pdo->prepare("SELECT count(*) FROM client ");
     $stmt->execute();
     $count= $stmt->fetch(PDO::FETCH_NUM)[0];
     
     $stmt = $pdo->prepare("SELECT * FROM client ");
     $stmt->execute();
     $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

     # $current_page = $_GET['page'] ?? 1;
     $current_page = $_GET['page'] ?? 1 ;
     $page = ceil($count / ITEM_PER_PAGE );
    

    if(isset($_GET['page'])) {
     
      $offset = ITEM_PER_PAGE * ($current_page - 1);

      $stmt = $pdo->prepare("SELECT * FROM client LIMIT ".ITEM_PER_PAGE." OFFSET $offset ");
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

    }else {

      $stmt = $pdo->prepare("SELECT * FROM client LIMIT ".ITEM_PER_PAGE."");
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

    }

    if(isset($_GET['next'])) {
      if($current_page <= $page) {
          $current_page ++;
        }
    }

    if(isset($_GET['pre'])) {
      if($current_page >= $page) {
          $current_page --;
        }
    }

    
    
    #__________________________________________________________________
    $page_search = ceil($count / ITEM_PER_PAGE_SEARCH);
    //pour la recherche
    if (isset($_GET['q']) AND !empty($_GET['q'])) {
     
      $value = $_GET['q'];
      $_SESSION['value'] = $value;
      
      $stmt = $pdo->prepare("SELECT count(*) FROM client WHERE CONCAT(nom,prenom,adresse,email,telephone,sexe) LIKE '%".$value."%'");
      $stmt->execute();
      $count = $stmt->fetch(PDO::FETCH_NUM)[0];
    
      if (isset($_GET['pages'])) {

        $current_page = $_GET['pages'];
        $offset = ITEM_PER_PAGE * ($current_page - 1);
        $stmt1 = $pdo->prepare("SELECT * FROM client WHERE CONCAT(nom,prenom,adresse,email,telephone,sexe) LIKE '%".$value."%' LIMIT ".ITEM_PER_PAGE_SEARCH." OFFSET $offset");
        $stmt1->execute();
        $results = $stmt1->fetchAll(PDO::FETCH_OBJ);

      }else {
        
        $stmt = $pdo->prepare("SELECT * FROM client WHERE CONCAT(nom,prenom,adresse,email,telephone,sexe) LIKE '%".$value."%' LIMIT ".ITEM_PER_PAGE_SEARCH."");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      }

      }


    #__________________________________________________________________
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
                        <h4 class="fw-bold mb-0">Liste des clients</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <a href="../FORMULAIRE/form_client.php" class="btn btn-primary btn-sm me-3"><i class="fa-solid fa-plus"></i>
                                <span>Ajouter</span>
                            </a>
                        </div>
                    </div>
                 </div>
            <div class="dropdown-divider bordergreen" ></div>

                    <form action="view_client.php" method="GET" >
                        <div class="d-flex justify-content-end">
                          <div class="search-box">
                              <input type="text" class="btn-sm me-3" name="q" style="font-size:16px" style="position: relative; left:-25%" placeholder="Recherche..." />
                              <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i></button>
                            </div>
                          </div>
                      </form>
                  
                      <table class="table table-striped" >
                              <thead style="background-color: #0a2558; color:#fff;">
                                  <tr>
                                      <th>Nom</th>
                                      <th>Prenom</th>
                                      <th>Adresse</th>
                                      <th>Email</th>
                                      <th>Téléphone</th>
                                      <th>Type</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>

                              <?php if (isset($results) AND !empty($results)):?>

                                <tbody>
                                <?php foreach ($results as $clients):?>
                                  <tr>
                                          <td><?=$clients->nom?></td>
                                          <td><?=$clients->prenom?></td>
                                          <td><?=$clients->adresse?></td>
                                          <td><?=$clients->email?></td>
                                          <td><?=$clients->telephone?></td>
                                          <td><?=$clients->sexe?></td>
                                          <td>
                                            <a href="../FORMULAIRE/modif_client.php?id_client=<?=$clients->id_client?>"><i class="fa-regular fa-pen-to-square btn-sm"  style="font-size:16pt"></i></a>
                                            <a onclick="return confirm('Etes vous sûr de vouloir supprimer cette ligne ? Cette action est irreversible!')" href="view_client.php?id_client=<?=$clients->id_client?>"><i class="fa-solid fa-trash-can  btn-sm" style="color:red; font-size:16pt"></i></a>
                                          </td>
                                      </tr>
                                  <?php endforeach ?>
                                 
                                  <?php elseif(isset($results) AND empty($results)):?>
                                      <div class="alert alert-danger">
                                        Aucun résultat trouver
                                      </div>
                                  <?php else :?>

                                  <?php foreach ($rows as $clients):?>
                                       
                                      <tr>
                                          <td><?=$clients->nom?></td>
                                          <td><?=$clients->prenom?></td>
                                          <td><?=$clients->adresse?></td>
                                          <td><?=$clients->email?></td>
                                          <td><?=$clients->telephone?></td>
                                          <td><?=$clients->sexe?></td>
                                          <td>
                                            <a href="../FORMULAIRE/modif_client.php?id_client=<?=$clients->id_client?>"><i class="fa-regular fa-pen-to-square btn-sm"  style="font-size:16pt"></i></a>
                                            <a onclick="return confirm('Etes vous sûr de vouloir supprimer cette ligne ? Cette action est irreversible!')" href="view_client.php?id_client=<?=$clients->id_client?>"><i class="fa-solid fa-trash-can  btn-sm" style="color:red; font-size:16pt"></i></a>
                                          </td>
                                      </tr>
                                      <?php endforeach ?>
                                    
                              </tbody>
                              <?php endif ?>
                          </table>
                          
                      
                          <?php if(isset($_GET['q']) AND !empty($_GET['q'])): ?>
                                    <ul class="pagination" >
                                        <li class="page-item"><a class="page-link" href="?pre">Previous</a></li>
                                        <?php for($i=1; $i <= $page_search; $i++):?>
                                          <li class="page-item <?php echo $i == $current_page ? "active" : ''?> "><a class="page-link" href="?pages=<?=$i?>&q=<?=$_SESSION['value']?>"><?=$i?></a></li>
                                        <?php endfor ?>
                                        <li class="page-item"><a class="page-link" href="?next">Next</a></li>
                                    </ul>
                                  
                                <?php else :?>
                                <ul class="pagination" >
                                    <li class="page-item"><a class="page-link" href="?pre">Previous</a></li>
                                    <?php for($i=1; $i <= $page; $i++):?>
                                        <li class="page-item <?php echo $i == $current_page ? "active" : ''?> "><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
                                    <?php endfor ?>
                                    <li class="page-item"><a class="page-link" href="?next">Next</a></li>
                                </ul>
                      <?php endif ?>
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
