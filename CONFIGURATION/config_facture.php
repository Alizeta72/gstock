<?php

  if(isset($_POST['okay'])){
 

 //id_F	id_vente	id_client	numero_F	date_F	mode_p	montant
         $id_vente = htmlspecialchars($_POST['vente']);
         $id_client = htmlspecialchars($_POST['vente']);
         $numero_F = htmlspecialchars($_POST['numero_F']);
         $mode_p = $_POST['mode_p'];
         $date_F = htmlspecialchars($_POST['date_F']);
         $montant = $_POST['montant'];
      
         if (!empty($id_client) && !empty($id_vente) && !empty($numero_F) && !empty($mode_p) && !empty($date_F) && !empty($montant))
         {
           
            if(empty($message)) {

               $table = "facture";
               $columns = "id_vente,id_client,numero_F,mode_p,date_F,montant";
               $values = [$id_vente,$id_client,$numero_F,$mode_p,$date_F,$montant];
               insertIntoDatabase($table,$columns,$values);
               $message_success = "la facture a été bien ajouter";
              
            }else {
               $message = "Veauillez remplir tous les champs";
            }
         }
   }
  
  