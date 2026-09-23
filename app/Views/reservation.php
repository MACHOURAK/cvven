```php
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Réservation - CVVEN</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
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

                <a class="nav-link" href="/reservations">
                    Réservations
                </a>

            </div>

        </div>
    </nav>


    <!-- Contenu -->
    <main class="container py-5">

        <div class="text-center mb-5">

            <h1 class="fw-bold">
                Réserver une chambre
            </h1>

            <p class="text-muted">
                Remplissez les informations pour effectuer votre réservation.
            </p>

        </div>


        <!-- Informations du village et de la chambre -->
        <div class="card shadow-sm mb-4">

            <div class="card-body">

                <h3 class="card-title">
                    <?= esc($village['nom']) ?>
                </h3>

                <p class="mb-1">
                    <strong>Chambre :</strong>
                    <?= esc($chambre['nom']) ?>
                </p>

                <p class="mb-1">
                    <strong>Prix :</strong>
                    <?= esc($prix) ?> € / nuit
                </p>

                <p class="mb-0">
                    <strong>Disponibilité :</strong>
                    <?= esc($nombreDisponible) ?> chambre(s)
                </p>

            </div>

        </div>


        <!-- Message d'erreur -->
        <?php if (!empty($erreur)): ?>

            <div class="alert alert-danger">
                <?= esc($erreur) ?>
            </div>

        <?php endif; ?>


        <!-- Formulaire -->
        <div class="card shadow-sm">

            <div class="card-body">

                <form action="/reservation/confirm" method="post">

                    <!-- Identifiants cachés -->
                    <input
                        type="hidden"
                        name="village_id"
                        value="<?= esc($villageId) ?>"
                    >

                    <input
                        type="hidden"
                        name="chambre_id"
                        value="<?= esc($chambreId) ?>"
                    >


                    <!-- Nom -->
                    <div class="mb-3">

                        <label for="nom_client" class="form-label">
                            Nom
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="nom_client"
                            name="nom_client"
                            required
                        >

                    </div>


                    <!-- Prénom -->
                    <div class="mb-3">

                        <label for="prenom_client" class="form-label">
                            Prénom
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="prenom_client"
                            name="prenom_client"
                            required
                        >

                    </div>


                    <!-- Date d'arrivée -->
                    <div class="mb-3">

                        <label for="date_arrivee" class="form-label">
                            Date d'arrivée
                        </label>

                        <input
                            type="date"
                            class="form-control"
                            id="date_arrivee"
                            name="date_arrivee"
                            value="<?= esc($dateArrivee ?? '') ?>"
                            required
                        >

                    </div>


                    <!-- Date de départ -->
                    <div class="mb-3">

                        <label for="date_depart" class="form-label">
                            Date de départ
                        </label>

                        <input
                            type="date"
                            class="form-control"
                            id="date_depart"
                            name="date_depart"
                            value="<?= esc($dateDepart ?? '') ?>"
                            required
                        >

                    </div>


                    <!-- Nombre de chambres -->
                    <div class="mb-3">

                        <label for="nombre_chambres" class="form-label">
                            Nombre de chambres
                        </label>

                        <input
                            type="number"
                            class="form-control"
                            id="nombre_chambres"
                            name="nombre_chambres"
                            min="1"
                            max="<?= esc($nombreDisponible) ?>"
                            value="<?= esc($nombreChambres ?? 1) ?>"
                            required
                        >

                    </div>


                    <!-- Prix total -->
                    <?php if ($prixTotal !== null): ?>

                        <div class="alert alert-info">

                            <strong>
                                Prix total :
                            </strong>

                            <?= esc($prixTotal) ?> €

                        </div>

                    <?php endif; ?>


                    <!-- Boutons -->
                    <div class="d-flex gap-2">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Confirmer la réservation
                        </button>

                        <a
                            href="/villages"
                            class="btn btn-outline-secondary"
                        >
                            Retour aux villages
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </main>


    <!-- Pied de page -->
    <footer class="bg-dark text-white text-center py-4 mt-5">

        <p class="mb-0">
            © 2026 CVVEN - Tous droits réservés
        </p>

    </footer>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>

</html>
```
