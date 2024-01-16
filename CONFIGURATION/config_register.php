<?php
if(isset($_POST['okay'])){

        
         $user_type = $_POST['role'];
         $username = htmlspecialchars( $_POST['username']);
         $pass = md5($_POST['password']);
         $name = htmlspecialchars( $_POST['name']);
         $email = htmlspecialchars( $_POST['email']);
      
         if (!empty($user_type) && !empty($username ) && !empty($pass) && !empty($name) && !empty($email)) {
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Veuillez soumettre un adresse email valide";
              }
             
              if (empty(($message))) {
                     $table = "users";
                     $columns = "role, username, password, name, email";
                     $values = [$user_type ,$username , $pass , $name, $email];
                     insertIntoDatabase($table, $columns, $values);
                     $message_success = "Nouveau utilisateur ajouté avec success";
               }
               }else {
                  $message = "Veuillez remplir tous les champs";
               }

      }

