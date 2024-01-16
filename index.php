
<?php
    session_start();
    include "INCLUDE/bd.php";
    

    if(isset($_POST['envoi'])){
        if (!empty($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['role']) ) {

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $pseudo = htmlspecialchars($_POST['username']);
            $mdp = md5($_POST['password']);
            $role = htmlspecialchars($_POST['role']);
            
            if(empty($pseudo)) {
                $_SESSION['message'] = "Nom d'utilisateur est obligatoire";
            }else if(empty($mdp)) {
                $_SESSION['message'] = "Mot de passe est obligatoire";
            }else {

                    $sql = "SELECT * FROM users WHERE username = ? AND password = ? AND role = ?  ";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array($pseudo, $mdp, $role));

                    if ( $stmt->rowCount() > 0) {
                        $_SESSION['username'] = $pseudo;
                        $_SESSION['password'] = $mdp;
                        $_SESSION['role'] = $role;
                        $_SESSION['id'] = $stmt->fetch();
                        header("Location: VIEW/Home.php");

                    }else {
                         $_SESSION['message'] ="Votre mot de passe ou le nom ou le status est incorrect...";
                    }
                }
            }else {
                  $_SESSION['message'] = "Votre mot de passe ou le nom ou le status est incorrect...";
            }
            }else {
                  $_SESSION['message'] = "Veuillez compléter tous les champs...";
            }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Suivi des paiement des factures du fournisseur</title>
</head>
<body style="background-color: rgb(10, 110, 40); color:#fff;">
    <style>
        body {
          background-image: url('./IMAGE/th.jpeg');
          background-repeat: no-repeat;
          background-size: cover;
		      background-position: center;
        }
    </style>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form class="border shadow p-3 rounded" action="" method="POST" style="width: 450px;">
            <h1 class="text-center p-3">Connexions</h1>
            
            <?php  if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-danger" role="alert">
                    <?=$_SESSION['message'] ?>
                    </div>
            <?php } ?>

            <div class="mb-3">
                <label for="username" class="form-label">Nom</label>
                <input type="text" class="form-control" name="username" id="username" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password" autocomplete="off">
            </div>

            <div class="mb-1">
                <label class="form-label">Choisir le type d'utilisateur : </label>
            </div>
            <select class="form-select mb-3" aria-label="Default select example" name="role">
                <option selected value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            
            <button type="submit" name="envoi" class="btn btn-primary">Se connecter</button>
            </form>
    </div>
    
</body>
</html>
<?php  