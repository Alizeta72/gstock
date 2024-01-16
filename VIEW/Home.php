<?php
      session_start();
      require "../INCLUDE/bd.php";
      require "../FUNCTION/function.php";


     if(isset($_SESSION['username']) && isset($_SESSION['id'])){

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>POISSONNERIE DU BURKINA FASO</title>
    <link rel="stylesheet" href="../STYLE/style.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>

  <?php if ($_SESSION['role'] == 'admin') { ?>

    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">Poisonnerie du BF</span>
        
       
      </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">GESTION DE STOCK</span>
          </a>
        </li>
        <li>
          <a href="view_produit.php">
            <i class="bx bx-message" ></i>
            <span class="links_name">Produits</span>
          </a>
        </li>
        <li>
          <a href="view_facture.php">
            <i class="bx bx-heart" ></i>
            <span class="links_name">Factures</span>
          </a>
        </li>
        <li>
          <a href="view_fourn.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Fournisseurs</span>
          </a>
        </li>
        <li>
          <a href="view_achat.php">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="links_name">Achats</span>
          </a>
        </li>
        <li>
          <a href="view_vente.php" >
            <i class="bx bx-coin-stack"></i>
            <span class="links_name">Ventes</span>
          </a>
        </li>
        <li>
          <a href="view_client.php">
            <i class="bx bx-book-alt"></i>
            <span class="links_name">Clients</span>
          </a>
        </li>
        <li>
          <a href="view_utilisateur.php">
            <i class="bx bx-user"></i>
            <span class="links_name">Utilisateur</span>
          </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class="bx bx-message" ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-heart" ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li> -->
        <li>
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="links_name">Configuration</span>
          </a>
        </li>
        <li class="log_out">
          <a href="../SECURITY/logout.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>
       <!-- <div class="search-box">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div>-->
        <div class="profile-details">
          <!--<img src="images/profile.jpg" alt="">-->
          <span class="admin_name">
          Salut!
                <?php 
                    echo $_SESSION['username'];
                ?></span>
        </div>
      </nav>

      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Commandes</div>
              <div class="number">
                <?php 
                    $count = getTotal("achat");
                    echo $count;
                ?>
              </div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
          </div>

          <div class="box">
            <div class="right-side">
              <div class="box-topic">Ventes</div>
              <div class="number">
              <?php 
                $count = getTotal("vente");
                echo $count;
              ?>
              </div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
          </div>

          <div class="box">
            <div class="right-side">
              <div class="box-topic">Factures</div>
              <div class="number">
              <?php 
                $count = getTotal("facture");
                echo $count;
              ?>
              </div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bx-cart cart three"></i>
          </div>

          <div class="box">
            <div class="right-side">
              <div class="box-topic">Fournisseurs</div>
              <div class="number">
              <?php 
                $count = getTotal("fournisseur");
                echo $count;
              ?>
              </div>
              <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">Aujourd'hui</span>
              </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
          </div>
        </div>

        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">Vente recentes</div>
            <div class="sales-details">
              <ul class="details">
                <li class="topic">Date</li>
                <li><a href="#">02 Jan 2021</a></li>
                <li><a href="#">02 Jan 2021</a></li>
                <li><a href="#">02 Jan 2021</a></li>
                <li><a href="#">02 Jan 2021</a></li>
                <li><a href="#">02 Jan 2021</a></li>
                <li><a href="#">02 Jan 2021</a></li>
                <li><a href="#">02 Jan 2021</a></li>
              </ul>
              <ul class="details">
                <li class="topic">Client</li>
                <li><a href="#">Abdoul Razak</a></li>
                <li><a href="#">Abdel Nasser</a></li>
                <li><a href="#">Maman Sani</a></li>
                <li><a href="#">Narouwa</a></li>
                <li><a href="#">Ishaka</a></li>
                <li><a href="#">Abdoullah</a></li>
                <li><a href="#">Adam</a></li>
                <li><a href="#">Komche</a></li>
                <li><a href="#">Adamou</a></li>
              </ul>
              <ul class="details">
                <li class="topic">Produit</li>
                <li><a href="#">Ordinateur</a></li>
                <li><a href="#">iPhone</a></li>
                <li><a href="#">Returned</a></li>
                <li><a href="#">Ordinateur</a></li>
                <li><a href="#">iPhone</a></li>
                <li><a href="#">Returned</a></li>
                <li><a href="#">Ordinateur</a></li>
                <li><a href="#">iPhone</a></li>
                <li><a href="#">Ordinateur</a></li>
              </ul>
              <ul class="details">
                <li class="topic">Prix</li>
                <li><a href="#">204.98 F</a></li>
                <li><a href="#">24.55 F</a></li>
                <li><a href="#">25.88 F</a></li>
                <li><a href="#">170.66 F</a></li>
                <li><a href="#">56.56 F</a></li>
                <li><a href="#">44.95 F</a></li>
                <li><a href="#">67.33 F</a></li>
                <li><a href="#">23.53 F</a></li>
                <li><a href="#">46.52 F</a></li>
              </ul>
            </div>
            <div class="button">
              <a href="#">Voir Tout</a>
            </div>
          </div>
          <div class="top-sales box">
            <div class="title">Produit le plus vendu</div>
            <ul class="top-sales-details">
              <li>
                <a href="#">
                  <!--<img src="images/sunglasses.jpg" alt="">-->
                  <span class="product">Ordinateur</span>
                </a>
                <span class="price">1107 F</span>
              </li>
              <li>
                <a href="#">
                  <!--<img src="images/jeans.jpg" alt="">-->
                  <span class="product">PC</span>
                </a>
                <span class="price">1567 F</span>
              </li>
              <li>
                <a href="#">
                  <!-- <img src="images/nike.jpg" alt="">-->
                  <span class="product">Chaussure</span>
                </a>
                <span class="price">1234 F</span>
              </li>
              <li>
                <a href="#">
                  <!--<img src="images/scarves.jpg" alt="">-->
                  <span class="product">Pantalon</span>
                </a>
                <span class="price">2312 F</span>
              </li>
              <li>
                <a href="#">
                  <!--<img src="images/blueBag.jpg" alt="">-->
                  <span class="product">Samsung</span>
                </a>
                <span class="price">1456 F</span>
              </li>
              <li>
                <a href="#">
                  <!--<img src="images/bag.jpg" alt="">-->
                  <span class="product">iPhone</span>
                </a>
                <span class="price">2345 F</span>
              </li>

              <li>
                <a href="#">
                  <!--<img src="images/addidas.jpg" alt="">-->
                  <span class="product">iPhone X</span>
                </a>
                <span class="price">2345 F</span>
              </li>
              <li>
                <a href="#">
                  <!--<img src="images/shirt.jpg" alt="">-->
                  <span class="product">TShirt</span>
                </a>
                <span class="price">1245 F</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <?php }else { ?>
      <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">Poisonnerie du BF</span>
        
       
      </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">GESTION DE STOCK</span>
          </a>
        </li>
        <li>
          <a href="view_produit.php">
            <i class="bx bx-message" ></i>
            <span class="links_name">Produits</span>
          </a>
        </li>
        <li>
          <a href="view_facture.php">
            <i class="bx bx-heart" ></i>
            <span class="links_name">Factures</span>
          </a>
        </li>
        <li>
          <a href="view_fourn.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Fournisseurs</span>
          </a>
        </li>
        <li>
          <a href="view_achat.php">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="links_name">Achats</span>
          </a>
        </li>
        <li>
          <a href="view_vente.php" >
            <i class="bx bx-coin-stack"></i>
            <span class="links_name">Ventes</span>
          </a>
        </li>
        <li>
          <a href="view_client.php">
            <i class="bx bx-book-alt"></i>
            <span class="links_name">Clients</span>
          </a>
        </li>
        <li>
          <a href="view_utilisateur.php">
            <i class="bx bx-user"></i>
            <span class="links_name">Utilisateur</span>
          </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class="bx bx-message" ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-heart" ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li> -->
        <li>
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="links_name">Configuration</span>
          </a>
        </li>
        <li class="log_out">
          <a href="../SECURITY/logout.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>
       <!-- <div class="search-box">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div>-->
        <div class="profile-details">
          <!--<img src="images/profile.jpg" alt="">-->
          <span class="admin_name">
            Salut!
          <?php 
              echo $_SESSION['username'];
          ?>
          </span>
        </div>
      </nav>

      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Commandes</div>
              <div class="number">
                <?php
                    $count = getTotal("achat");
                    echo $count;
                ?>
              </div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
          </div>

          <div class="box">
            <div class="right-side">
              <div class="box-topic">Ventes</div>
              <div class="number">
              <?php 
                $count = getTotal("vente");
                echo $count;
              ?>
              </div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
          </div>

          <div class="box">
            <div class="right-side">
              <div class="box-topic">Factures</div>
              <div class="number">
              <?php 
                $count = getTotal("facture");
                echo $count;
              ?>
              </div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bx-cart cart three"></i>
          </div>

          <div class="box">
            <div class="right-side">
              <div class="box-topic">Fournisseurs</div>
              <div class="number">
              <?php 
                $count = getTotal("fournisseur");
                echo $count;
              ?>
              </div>
              <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">Aujourd'hui</span>
              </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
          </div>
        </div>

      </div>
    </section>
    <?php  } ?>

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>
  </body>
</html>
<?php   }else {
         header("Location: ../index.php");
     }?>