<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
        <h1 class="display-6 text-center font-monospace text-decoration-underline">Ajout d'une Catégorie</h1>

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

                <label for="categorie">Catégorie</label>
                <input type="text" name="categorie" id="categorie" class="form-control" placeholder="Entrez une catégorie">
                <button type="submit" class="btn btn-primary col-12 mt-2" name="soumis">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<?php
$contenu = ob_get_clean();
require_once('./views/admin/templateAdmin.php');
?>