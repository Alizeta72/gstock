<?php
      require "../INCLUDE/bd.php";
      require "../FUNCTION/function.php";
    

      require "../INCLUDE/head.php";
    ?>

<br>

<div class="home-content">
    <button class="hidden-print btn btn-primary" id="btnPrint" style="position: relative; left:45%" ><i class="fa-solid fa-print btn-sm" style="color:#ffffff; font-size:14pt"></i>Imprimer</button>
<div class="page">

    <div class="cote-a-cote">
        <h5>Vente</h5>
        <br><br><br>
                    <div>
                    <br><br>
                    <?php foreach (getFacture() as $fact): ?>
                        <p>Reçu N° #: <?= $fact['numero_f'] ?> </p>
                        <p>Date: <?= date('d/m/Y', strtotime($fact['date_F'])) ?></p>
                        <p>Mode P. #: <?= $fact['mode_p'] ?> </p>
                    </div>
                    </div>
        
                <div class="cote-a-cote">
                    <p>Nom :</p>
                    <p style="width: 92%;"><?= $fact['nom']?></p>
                </div>
                <div class="cote-a-cote">
                    <p>Prémon :</p>
                    <p style="width: 85%;"><?= $fact['prenom'] ?></p>
                </div>
                <div class="cote-a-cote">
                    <p>Adresse :</p>
                    <p style="width: 87%;"><?= $fact['adresse'] ?></p>
                </div>
                <div class="cote-a-cote">
                    <p>Télephone :</p>
                    <p style="width: 92%;"><?= $fact['telephone'] ?></p>
                </div>
                <br><td>
                <table class="mtable">
                    <tr>
                        <th>Référence</th>
                        <th>Désignation</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                    </tr>
                    <tr>
                        <td><?=$fact['nom_article']?></td>
                        <td><?=$fact['categorie'] ?></td>
                        <td><?=number_format($fact['quantite'],0,',','.') ?></td>
                        <td><?=number_format($fact['prix_unitaire'] ,0,',','.')?></td>
                    </tr>
                    <tr>
                        <th colspan="3" class="my-table">Montant HT</th>
                        <th><?=number_format($fact['montant'],0,',','.') ?></th>
                    </tr>
                    <tr>
                        <td colspan="5" id="sign">Signature</td>
                    </tr>
            </table>
    <?php endforeach ?>
</div>

</div>

<script>

var btnPrint = document.querySelector('#btnPrint');
btnPrint.addEventListener("click", () => {
    window.print();
});

</script>

<?php
        require "../INCLUDE/footer.php";
        
    ?>
