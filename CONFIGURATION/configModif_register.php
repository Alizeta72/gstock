<?php

      if(isset($_POST['modif'])){

         $user_type = $_POST['role'];
         $username = htmlspecialchars( $_POST['username']);
         $pass = md5($_POST['password']);
         $name = htmlspecialchars( $_POST['name']);
         $email = htmlspecialchars( $_POST['email']);
      
         if (!empty($user_type) && !empty($username ) && !empty($pass) && !empty($name) && !empty($email)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $error['email'] = "veuillez soumettre un adresse email valide";
             }
               if (empty(($message))) {
                  $table = "users";

                  $params = [

                     "role"=>$user_type,
                     "username"=>$username,
                     "password"=>$pass,
                     "name"=>$name,
                     "email"=>$email
                     
                  ];
                  
                  updateEntity($table, $params, $_GET['id'],"id");
                  $message_success = "Modification effectée avec success";
                  }
               }else {
                  $message = "Veuillez remplir tous les champs";
               }
      }
  