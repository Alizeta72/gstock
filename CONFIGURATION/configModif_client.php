<?php

      if(isset($_POST['modif'])){

         $prenom = htmlspecialchars($_POST['prenom']);
         $nom = htmlspecialchars($_POST['nom']);
         $adresse = htmlspecialchars($_POST['adresse']);
         $email = htmlspecialchars($_POST['email']);
         $telephone = $_POST['telephone'];
         $sexe = htmlspecialchars($_POST['sexe']);

         if (!empty($prenom) && !empty($nom)  && !empty($adresse)  && !empty($email)  && !empty($telephone)  && !empty($sexe)) {
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "veuillez soumettre un adresse email valide";
              }

         if (empty(($message))) {
            $table = "client";

            $params = [
                "nom"=>$nom,
                "prenom"=>$prenom,
                "adresse"=>$adresse,
                "email"=>$email,
                "telephone"=>$telephone,
                "sexe"=>$sexe
            ];
            
            updateEntity($table, $params, $_GET['id_client'],"id_client");
            $message_success = "Modification effecter avec success";
            }
         }else {
            $message = "veauillez remplir tous les champs";
         }

      }
  