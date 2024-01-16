<?php

    if(isset($_SESSION['username']) && isset($_SESSION['id'])){

        $sql = "SELECT * FROM users ORDER BY id ASC";
        $stmt = $pdo->prepare($sql);

    }else {
        header("Location: ../index.php");
    }
    
    ?>



