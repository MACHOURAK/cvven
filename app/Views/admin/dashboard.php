<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administration CVVEN</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>Espace Administration CVVEN</h1>
            <p class="text-muted mb-0">
                Bienvenue <?= esc(session()->get('username')) ?>
            </p>
        </div>

        <a href="/logout" class="btn btn-outline-danger">
            Déconnexion
        </a>
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


    <!-- Gestion des villages -->

    <div class="card mb-4">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">Gestion des villages</h2>

            <a href="/admin/villages" class="btn btn-primary btn-sm">
                Gérer les villages
            </a>
        </div>

        <div class="card-body">

            <p class="mb-0">
                <?= count($villages) ?> village(s) enregistré(s).
            </p>

        </div>

    </div>


    <!-- Réservations -->

    <div class="card">

        <div class="card-header">
            <h2 class="h5 mb-0">
                Réservations
            </h2>
        </div>

        <div class="card-body">

            <?php if (empty($reservations)): ?>

                <div class="alert alert-info mb-0">
                    Aucune réservation enregistrée.
                </div>

            <?php else: ?>

                <div class="table-responsive">

                    <table class="table table-striped table-bordered align-middle">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Village</th>
                                <th>Chambre</th>
                                <th>Arrivée</th>
                                <th>Départ</th>
                                <th>Nombre de chambres</th>
                                <th>Prix total</th>
                                <th>Statut</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php foreach ($reservations as $res): ?>

                            <tr>

                                <td>
                                    <?= esc($res['id']) ?>
                                </td>

                                <td>
                                    <?= esc($res['village_id']) ?>
                                </td>

                                <td>
                                    <?= esc($res['chambre_id']) ?>
                                </td>

                                <td>
                                    <?= esc($res['date_arrivee']) ?>
                                </td>

                                <td>
                                    <?= esc($res['date_depart']) ?>
                                </td>

                                <td>
                                    <?= esc($res['nombre_chambres']) ?>
                                </td>

                                <td>
                                    <?= esc($res['prix_total']) ?> €
                                </td>

                                <td>
                                    <?php
                                    $statut = $res['statut'] ?? 'inconnu';
                                    ?>

                                    <?php if ($statut === 'confirmee'): ?>

                                        <span class="badge bg-success">
                                            Confirmée
                                        </span>

                                    <?php elseif ($statut === 'annulee'): ?>

                                        <span class="badge bg-danger">
                                            Annulée
                                        </span>

                                    <?php else: ?>

                                        <span class="badge bg-secondary">
                                            <?= esc($statut) ?>
                                        </span>

                                    <?php endif; ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

</body>
</html>