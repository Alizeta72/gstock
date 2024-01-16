<?php

      if(isset($_POST['modif'])){

         $nom_article = htmlspecialchars($_POST['nom_article']);
         $categorie = htmlspecialchars($_POST['categorie']);
         $quantite = htmlspecialchars($_POST['quantite']);
         $prix_unitaire = $_POST['prix_unitaire'];
         $date_expiration = htmlspecialchars($_POST['date_expiration']);
         $date_fabrication = htmlspecialchars($_POST['date_fabrication']);

         if (!empty($nom_article) && !empty($categorie) && !empty($quantite) && !empty($prix_unitaire) && !empty($date_expiration) && !empty($date_fabrication))
            if (isset($_FILES['image']) && !empty($_FILES['image'])) {

              $extention_valide = array("jpeg, png, jpg");

              $file_name = $_FILES['image']['name'];
              $file_tmp = $_FILES['image']['tmp_name'];

              $extention = pathinfo($file_name,PATHINFO_EXTENSION);

              if(in_array($extention,$extention_valide)){

                $image_path = "../IMAGE/".$file_name;

                if (!move_uploaded_file($file_tmp,$image_path)) {
                    $message = "l'imange n'a pas été déplacer";
                }
              }else {
                $message = "veuillez choisir une extention valide";
              }
            }
         if (empty(($message))) {
            $table = "article";

            $params = [
                "nom_article"=>$nom,
                "categorie"=>$categorie,
                "image"=>$file_name,
                "quantite"=>$quantite,
                "prix_unitaire"=>$prix_unitaire,
                "date_expiration"=>$date_expiration,
                "date_fabrication"=>$date_fabrication
            ];
            
            updateEntity($table, $params, $_GET['id_article'],"id_article");
            $message_success = "Modification effecter avec success";
            }
         }else {
            $message = "veauillez remplir tous les champs";
         }

   
  