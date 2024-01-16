<?php

  if(isset($_POST['okay'])){
 # id_achat	id_fournisseur	id_article	quantite	prix	date_achat


         $article = htmlspecialchars($_POST['article']);
         $id_fournisseur = htmlspecialchars($_POST['fournisseur']);
         $quantite = htmlspecialchars($_POST['quantite']);
         $prix_unitaire = $_POST['prix_unitaire'];
         $date_achat = htmlspecialchars($_POST['date_achat']);
      
         if (!empty($id_fournisseur) && !empty($article) && !empty($quantite) && !empty($prix_unitaire) && !empty($date_achat))
         {
           
            if(empty($message)) {

               $table = "achat";
               $columns = "id_fournisseur,id_article,quantite,prix,date_achat";
               $values = [$id_fournisseur,$article,$quantite,$prix_unitaire,$date_achat];
               insertIntoDatabase($table,$columns,$values);
               $message_success = "l'achat a été bien ajouter";
              }
            }else {
               $message = "Veauillez remplir tous les champs";
            }
          }
  
  
  