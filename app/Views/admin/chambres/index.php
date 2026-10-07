<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestion des chambres</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Gestion des chambres</h1>

        <div>
            <a href="/admin" class="btn btn-secondary">
                Retour admin
            </a>

            <a href="/admin/chambres/ajouter" class="btn btn-primary">
                Ajouter une chambre
            </a>
        </div>

    </div>


    <?php if (session()->getFlashdata('success')): ?>

        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <?php if (empty($chambres)): ?>

        <div class="alert alert-info">
            Aucune chambre enregistrée.
        </div>

    <?php else: ?>

        <div class="table-responsive">

            <table class="table table-bordered table-striped align-middle">

                <thead class="table-primary">

                    <tr>
                        <th>ID</th>
                        <th>Village</th>
                        <th>Nom</th>
                        <th>Capacité</th>
                        <th>Prix</th>
                        <th>Disponibilité</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                <?php foreach ($chambres as $chambre): ?>

                    <?php
                    $nomVillage = 'Inconnu';

                    foreach ($villages as $village) {
                        if ($village['id'] == $chambre['village_id']) {
                            $nomVillage = $village['nom'];
                            break;
                        }
                    }
                    ?>

                    <tr>

                        <td>
                            <?= esc($chambre['id']) ?>
                        </td>

                        <td>
                            <?= esc($nomVillage) ?>
                        </td>

                        <td>
                            <?= esc($chambre['nom']) ?>
                        </td>

                        <td>
                            <?= esc($chambre['capacite']) ?>

                            <?php if ($chambre['capacite'] == 1): ?>
                                personne
                            <?php else: ?>
                                personnes
                            <?php endif; ?>

                        </td>

                        <td>
                            <?= esc($chambre['prix']) ?> €
                        </td>

                        <td>
                            <?= esc($chambre['nombre_disponible']) ?>
                        </td>

                        <td>

                            <a
                                href="/admin/chambres/modifier/<?= $chambre['id'] ?>"
                                class="btn btn-sm btn-warning"
                            >
                                Modifier
                            </a>

                            <a
                                href="/admin/chambres/supprimer/<?= $chambre['id'] ?>"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Voulez-vous vraiment supprimer cette chambre ?');"
                            >
                                Supprimer
                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    <?php endif; ?>

</div>

</body>
</html>