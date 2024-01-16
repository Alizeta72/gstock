<?php

      if(isset($_POST['okay'])){
        
         $id_article = $_POST['article'];
         $id_client = $_POST['client'];
         $qte = $_POST['qte'];
         $prixTotal = $_POST['prix'];

         if(!empty($id_article) && !empty($id_client) && !empty($qte) && !empty($prixTotal)){

            if(!reduceStock($id_article,$qte)){
                $message = "le stock est insuffissant pour effectuer cette vente";
            }
            if(empty($message)) {

                $table = "vente";
                $columns = "id_article, id_client, quantite, prix, date_vente";
                $date = date('y-m-d H:i:s',strtotime('now'));
                $values = [$id_article, $id_client, $qte, $prixTotal, $date];
                insertIntoDatabase($table, $columns, $values);
                $message_success = "Vente effectuer avec success";
            }
            }else {
                $message = "veauillez remplir tous les champs";
            }

      }
  