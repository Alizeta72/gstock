<?php

      if(isset($_POST['okay'])){

         $prenom = htmlspecialchars($_POST['prenom']);
         $nom = htmlspecialchars($_POST['nom']);
         $adresse = htmlspecialchars($_POST['adresse']);
         $email = htmlspecialchars($_POST['email']);
         $telephone = $_POST['telephone'];
         $sexe = htmlspecialchars($_POST['sexe']);

         if (!empty($prenom) && !empty($nom) && !empty($adresse) && !empty($email) && !empty($telephone) && !empty($sexe))
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $error['email'] = "veuillez soumettre un adresse email valide";
            }
            if (empty(($message))) {
               $table = "fournisseur";
               $columns = "nom, prenom, adresse, email, telephone, sexe";
               $values = [ $nom, $prenom, $adresse, $email, $telephone, $sexe];
               insertIntoDatabase($table, $columns, $values);
               $message_success = "nouveau fournisseur ajouter avec success";
         
            }else {
               $message = "veauillez remplir tous les champs";
            }

   }
  