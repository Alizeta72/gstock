<?php

      if(isset($_POST['modif'])){

               
         //id_F	id_vente	id_client	numero_F	date_F	mode_p	montant
         $id_vente = htmlspecialchars($_POST['vente']);
         $id_client = htmlspecialchars($_POST['client']);
         $numero_F = htmlspecialchars($_POST['numero_F']);
         $mode_p = $_POST['mode_p'];
         $date_F = htmlspecialchars($_POST['date_F']);
         $montant = $_POST['montant'];

         if(!empty($id_client) && !empty($id_vente) && !empty($numero_F) && !empty($mode_p) && !empty($date_F) && !empty($montant))
         {
           
            if (empty(($message))) {
               $table = "facture";

               $params = [

                  "id_vente"=> $id_vente,
                  "id_client"=>$id_client,
                  "numero_F"=>$numero_F,
                  "date_F"=>$date_F,
                  "mode_p"=>$mode_p,
                  "montant"=>$montant
               ];
               
               updateEntity($table, $params, $_GET['id_F'],"id_F");
               $message_success = "Modification effecter avec success";
            
            }else {
               $message = "veauillez remplir tous les champs";
            }

         }
      }

?>