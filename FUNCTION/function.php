
<?php

function insertIntoDatabase($tableName, $colums, $values) {
    require "../INCLUDE/bd.php";
    try {
        $placeholder = implode(",", array_fill(0, count($values), "?"));
        $sql = "INSERT INTO $tableName ($colums) VALUES ($placeholder)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($values);

    } catch (PDOException $e) {
        echo "erreur lors de l'insertiondans la base de donnee :".$e->getMessage();
    }
}


function get($entityName){

    require "../INCLUDE/bd.php";
    $sql= "SELECT * FROM $entityName";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $all = $stmt->fetchAll();

    return $all;

}

function updateEntity($table,$params,$id,$idName){
    require "../INCLUDE/bd.php";
    $setClause = '';
    $values = [];

    foreach ($params as $key => $value) {
        $setClause.= "$key = ?,";
        $values[] = $value;
    }
    
    $trimClause = trim($setClause,",");

    $sql = "UPDATE $table SET $trimClause WHERE $idName = $id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($values);

}

function deleteEntity($tableName,$id,$idName){
    require "../INCLUDE/bd.php";

    $sql = "DELETE FROM $tableName WHERE $idName = $id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

}

function getEntityById($tableName,$id,$idName){
    require "../INCLUDE/bd.php";

    $sql = "SELECT * FROM $tableName WHERE $idName = $id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $client = $stmt->fetchAll();
    return $client;

}


function reduceStock($id_article,$quantite){
    require "../INCLUDE/bd.php";

    $stmt = $pdo->prepare("SELECT * FROM article WHERE id_article = ?");
    $stmt->execute(array($id_article));
    $article = $stmt->fetch();

    if($article->quantite < $quantite){
        return false;
    }
    $newStock = $article->quantite - $quantite;

    $stmt = $pdo->prepare("UPDATE article SET quantite = ? WHERE id_article = ?");
    $stmt->execute(array($newStock,$id_article));
    return true;

}


/**
 * function annulerStock($id_article,$quantite){
   *   require "../INCLUDE/bd.php";

   *   $stmt = $pdo->prepare("SELECT * FROM article WHERE id_article = ?");
   *   $stmt->execute(array($id_article));
    *  $article = $stmt->fetch();

   *   if($article->rowCount() !=$id_article){
       
   
   *   $newStock = $article->quantite + $quantite;

   *   $stmt = $pdo->prepare("UPDATE article SET quantite = ? WHERE id_article = ?");
    *  $stmt->execute(array($newStock,$id_article));

   *   deleteEntity($tableName,$id,$idName);

   *  *  return true;
 * }
 * }
 */

 function annulerStock($id_article,$quantite){
    require "../INCLUDE/bd.php";

    $stmt = $pdo->prepare("SELECT * FROM article WHERE id_article = ?");
    $stmt->execute(array($id_article));
    $article = $stmt->fetch();

    if($stmt->rowCount() != 1){
        $newStock = $article->quantite + $quantite;

        $stmt = $pdo->prepare("UPDATE article SET quantite = ? WHERE id_article = ?");
        $stmt->execute(array($newStock,$id_article));

        return true;
    }
    else{
        return false;
    }
}


function getTotal($entityName){

    require "../INCLUDE/bd.php";
    $sql = "SELECT count(*) FROM $entityName";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $client = $stmt->fetch(PDO::FETCH_NUM)[0];
    return (int)$client;
}


    function pagination($entityName,$byPage,$currentPage){

        $offset = $byPage * ($currentPage - 1);
        require "../INCLUDE/bd.php";
        $sql= "SELECT * FROM $entityName LIMIT $byPage OFFSET $offset";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $client = $stmt->fetchAll();

        return $client;

    }

    //récupérer les informations dans plusieurs tables pour les réçus(facture)
    function getVente() {

        require "../INCLUDE/bd.php";

        require "../INCLUDE/bd.php";
        $sql = "SELECT DISTINCT f.id_vente,f.id_client,f.numero_f,f.date_F,f.mode_p,f.montant,c.nom,c.prenom,c.adresse,
        c.email,c.telephone,v.id_article,v.id_client,v.quantite,v.prix,v.date_vente,a.nom_article,a.categorie,
        a.quantite,a.prix_unitaire,a.date_expiration,a.date_fabrication,v.id_vente,c.id_client,a.id_article,f.id_F
        FROM client AS c,facture AS f,vente AS v,article AS a WHERE v.id_vente=f.id_vente AND v.id_client=c.id_client
        AND v.id_article=a.id_article AND f.id_F=? ";


        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($_GET['id_F']));
        $fac = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fac;

    }

     //récupérer les informations dans plusieurs tables pour les réçus(facture)
     function getFacture() {

        require "../INCLUDE/bd.php";
        $sql = "SELECT DISTINCT f.id_vente,f.id_client,f.numero_f,f.date_F,f.mode_p,f.montant,c.nom,c.prenom,c.adresse,
        c.email,c.telephone,v.id_article,v.id_client,v.quantite,v.prix,v.date_vente,a.nom_article,a.categorie,
        a.quantite,a.prix_unitaire,a.date_expiration,a.date_fabrication,v.id_vente,c.id_client,a.id_article,f.id_F
        FROM client AS c,facture AS f,vente AS v,article AS a WHERE v.id_vente=f.id_vente AND v.id_client=c.id_client
        AND v.id_article=a.id_article AND f.id_F=? ";


        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($_GET['id_F']));
        $fac = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fac;

        
    }

    
