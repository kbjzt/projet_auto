<?php ob_start();?>
<h2>Commande</h2>
<div class="container">
    <form action="" method="POST">
        <input type="hidden" value="<?=$id;?>">

    </form>
</div>


<?php
$contenu = ob_get_clean();
require_once('./views/public/templatePublic.php');
?>