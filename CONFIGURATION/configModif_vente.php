
<?php

      if(isset($_POST['modif'])){
        
         $id_article = $_POST['article'];
         $id_client = $_POST['client'];
         $qte = $_POST['qte'];
         $prixTotal = $_POST['prix'];

         if(!empty($article) && !empty($client) && !empty($qte) && !empty($prixTotal)){

            if(!reduceStock($id_article,$qte)){
               $message = "le stock est insuffissant pour effectuer cette vente";
            }

            if (empty($message)) {
               $table = "client";
               $params = [
                   "id_article"=>$id_article,
                   "id_client"=>$id_client,
                   "quantite"=>$qte,
                   "prix"=>$prixTotal
               ];
                
               updateEntity($table, $params, $_GET['id_vente'],"id_vente");
               $message_success = "Modification effecter avec success";
               }
            }else {
               $message = "veauillez remplir tous les champs";
            }
   
      }
      
