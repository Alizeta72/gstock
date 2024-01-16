<?php
     require "../INCLUDE/bd.php";

    if (
        !empty($_GET['id_article']) &&
        !empty($_GET['quantite'])
        ){

            $stmt = $pdo->prepare("SELECT * FROM article WHERE id_article = ?");
            $stmt->execute(array($id_article));
            $article = $stmt->fetch();



            $newStock = $article->quantite - $quantite;

            $stmt = $pdo->prepare("UPDATE article SET quantite = ? WHERE id_article = ?");
            $stmt->execute(array($newStock,$id_article));
            return true;


        }
    }
    header('Location: ../VIEW/view_vente.php');