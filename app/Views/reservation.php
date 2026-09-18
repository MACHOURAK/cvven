<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Réservations - CVVEN</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">

            <a class="navbar-brand fw-bold" href="/">
                CVVEN
            </a>

            <div class="navbar-nav ms-auto">

                <a class="nav-link" href="/">
                    Accueil
                </a>

                <a class="nav-link" href="/villages">
                    Nos villages
                </a>

                <a class="nav-link active" href="/reservations">
                    Réservations
                </a>

            </div>

        </div>
    </nav>


    <!-- Contenu -->
    <main class="container py-5">

        <div class="text-center mb-5">

            <h1 class="fw-bold">
                Liste des réservations
            </h1>

            <p class="text-muted">
                Retrouvez ici toutes les réservations enregistrées.
            </p>

        </div>


        <?php if (empty($reservations)): ?>

            <!-- Aucune réservation -->
            <div class="alert alert-info text-center">
                Aucune réservation enregistrée.
            </div>

        <?php else: ?>

            <!-- Tableau -->
            <div class="table-responsive">

                <table class="table table-bordered table-striped table-hover align-middle">

                    <thead class="table-primary">

                        <tr>

                            <th>ID</th>

                            <th>Village</th>

                            <th>Chambre</th>

                            <th>Date d'arrivée</th>

                            <th>Date de départ</th>

                            <th>Nombre de chambres</th>

                            <th>Prix total</th>

                            <th>Statut</th>

                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($reservations as $reservation): ?>

                            <tr>

                                <td>
                                    <?= $reservation['id'] ?>
                                </td>

                                <td>
                                    <?= $reservation['village_nom'] ?>
                                </td>

                                <td>
                                    <?= $reservation['chambre_nom'] ?>
                                </td>

                                <td>
                                    <?= $reservation['date_arrivee'] ?>
                                </td>

                                <td>
                                    <?= $reservation['date_depart'] ?>
                                </td>

                                <td>
                                    <?= $reservation['nombre_chambres'] ?>
                                </td>

                                <td class="fw-bold">
                                    <?= $reservation['prix_total'] ?> €
                                </td>

                                <td>
                                    <?= $reservation['statut'] ?>
                                </td>

                                <td>

                                    <a
                                        href="/reservation/modifier/<?= $reservation['id'] ?>"
                                        class="btn btn-warning btn-sm"
                                    >
                                        Modifier
                                    </a>

                                    <a
                                        href="/reservation/supprimer/<?= $reservation['id'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Voulez-vous vraiment annuler cette réservation ?');"
                                    >
                                        Annuler
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php endif; ?>


        <!-- Boutons -->
        <div class="mt-4">

            <a href="/villages" class="btn btn-primary">
                Retour aux villages
            </a>

            <a href="/" class="btn btn-outline-secondary ms-2">
                Accueil
            </a>

        </div>

    </main>


    <!-- Pied de page -->
    <footer class="bg-dark text-white text-center py-4">

        <p class="mb-0">
            © 2026 CVVEN - Tous droits réservés
        </p>

    </footer>


    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>