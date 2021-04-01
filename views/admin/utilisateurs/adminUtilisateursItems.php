<?php

ob_start();

// var_dump($allUsers);
?>
<table class="table table-striped mt-5">
    <thead>
        <tr class="text-center bg-dark text-white">
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Login</th>
            <th>Grade</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($allUsers as $user) { ?>
            <tr class="text-center align-middle">
                <td><?= $user->getId() ?></td>
                <td><?= $user->getNom() ?></td>
                <td><?= $user->getPrenom() ?></td>
                <td><?= $user->getEmail() ?></td>
                <td><?= $user->getLogin() ?></td>
                <td><?= $user->getGrade()->getNom_g(); ?></td>
                <?php if($_SESSION['Auth']->id_g == 1){ ?>

                <td>
                    <?php
                    echo ($user->getStatut())
                        ? "<a href='index.php?action=list_u&id=" . $user->getId() . "&statut=" . $user->getStatut() . "'  onclick='return confirm(`Êtes vous sûr de vouloir désactiver`)' class='btn btn-success'><i class='fas fa-unlock'> Desactiver </i></a>"
                        : "<a href='index.php?action=list_u&id=" . $user->getId() . "&statut=" . $user->getStatut() . "'  onclick='return confirm(`Êtes vous sûr de vouloir activer`)'  class='btn btn-danger'><i class='fas fa-lock'> Activer </i></a>"
                    ?>
                </td>
                <?php } ?>

            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$contenu = ob_get_clean();
// echo $contenu;
require_once('./views/admin/templateAdmin.php');

?>