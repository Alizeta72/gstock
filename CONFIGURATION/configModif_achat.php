<?php

      if(isset($_POST['modif'])){

         $article = htmlspecialchars($_POST['article']);
         $id_fournisseur = htmlspecialchars($_POST['fournisseur']);
         $quantite = htmlspecialchars($_POST['quantite']);
         $prix_unitaire = $_POST['prix_achat'];
         $date_achat = htmlspecialchars($_POST['date_achat']);

         if (!empty($id_fournisseur) && !empty($article) && !empty($quantite) && !empty($prix_unitaire) && !empty($date_achat))
         {
           
         if (empty(($message))) {
            $table = "achat";

            $params = [
             
                "id_fournisseur"=>$id_fournisseur,
                "id_article"=>$article,
                "quantite"=>$quantite,
                "prix"=>$prix_unitaire,
                "date_achat"=>$date_achat
            ];
            
            updateEntity($table, $params, $_GET['id_achat'],"id_achat");
            $message_success = "Modification effecter avec success";
            }
         }else {
            $message = "veauillez remplir tous les champs";
         }

      }
  

?>