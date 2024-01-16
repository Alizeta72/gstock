
<?php

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=ges_stock", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "erreur de connexion :".$e->getMessage();
        }

        //creation de la table article
        $sql_article = "CREATE TABLE  article (
            id_article INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            nom_article VARCHAR(250) DEFAUTL NULL,
            categorie VARCHAR(250) DEFAUTL NULL,
            quantite INT DEFAULT NULL,
            prix_unitaire INT DEFAULT NULL,
            date_expiration DATE DEFAULT NULL,
            date_fabrication DATE DEFAULT NULL
        )";
        $pdo->exec($sql_article);

        //creation de la table client
        $sql_client = "CREATE TABLE client (
            id_client INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            nom VARCHAR(250) DEFAUTL NULL,
            prenom VARCHAR(250) DEFAUTL NULL,
            adresse VARCHAR(250) DEFAUTL NULL,
            email VARCHAR(250) DEFAUTL NULL,
            telephone INT DEFAULT NULL,
            sexe VARCHAR(250) NOT NULL
        )";
        $pdo->exec($sql_client);


        //id_F	id_vente	id_client	numero_F	date_F	mode_p	montant
        //creation de la table facture
        $sql_facture = "CREATE TABLE facture (
            id_F INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            id_vente INT DEFAULT NULL,
            id_client INT DEFAULT NULL,
            numero_F VARCHAR(250) DEFAUTL NULL,
            date_F DATE DEFAULT NULL,
            mode_p VARCHAR(250) DEFAUTL NULL,
            montant INT DEFAULT NULL
           
        )";
        $pdo->exec($sql_facture);

        
         //creation de la table achat
         $sql_achat = "CREATE TABLE achat (
            id_achat INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            id_article INT DEFAULT NULL,
            id_fournisseur INT DEFAULT NULL,
            quantite INT DEFAULT NULL,
            prix INT DEFAULT NULL,
            date_achat DATE DEFAULT NULL
        )";
        $pdo->exec($sql_achat);

        //creation de la table  fournisseur
        $sql_fournisseur = "CREATE TABLE fournisseur (
            id_fournisseur INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            nom VARCHAR(250) DEFAUTL NULL,
            prenom VARCHAR(250) DEFAUTL NULL,
            adresse VARCHAR(250) DEFAUTL NULL,
            email VARCHAR(250) DEFAUTL NULL,
            telephone INT DEFAULT NULL,
            sexe VARCHAR(250) NOT NULL
        )";
        $pdo->exec($sql_fournisseur);
       
         //creation de la table  vente
         $sql_vente = "CREATE TABLE vente (
            id_vente INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            id_article INT DEFAULT NULL,
            id_client INT DEFAULT NULL,
            quantite INT DEFAULT NULL,
            prix INT DEFAULT NULL,
            date_vente DATE DEFAULT NULL
        )";
        $pdo->exec($sql_vente);

          //creation de la table utilisateur
          $sql_user = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            role VARCHAR(50) NOT NULL,
            username VARCHAR(50) DEFAUTL NULL,
            password VARCHAR(50) DEFAUTL NULL,
            name VARCHAR(50) NOT NULL,
            email VARCHAR(50) DEFAUTL NULL
           
        )";
        $pdo->exec($sql_user);

        echo "create table successfully";


        
                                    