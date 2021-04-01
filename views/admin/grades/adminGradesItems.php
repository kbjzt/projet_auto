<?php ob_start(); ?>
<h1 class="display-6 text-center font-monospace text-decoration-underline">Liste Grades</h1><table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th colspan="2" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allGrade as $grade) { ?>
            <tr>
                <td><?= $grade->getId_g(); ?></td>
                <td><?= $grade->getNom_g() ?></td>
                <td class="text-center">
                    <a class="btn btn-success" href="index.php?action=edit_g&id=<?= $grade->getId_g(); ?>">
                        <i class="fas fa-pen"></i>
                    </a>
                </td>
                <?php if($_SESSION['Auth']->id_g !=3 ){ ?>
                <td class="text-center">
                    <a class="btn btn-danger" href="index.php?action=delete_g&id=<?= $grade->getId_g(); ?>" onclick="return confirm('Êtes vous sur de vouloir supprimer cette catégorie?')"><i class="fas fa-trash"></i></a>
                </td>
        <?php } ?>

            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$contenu = ob_get_clean();
require_once('./views/templateAdmin.php');
?>