```php
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Confirmation - CVVEN</title>

    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

    <!-- Barre de navigation -->

    <nav class="navbar navbar-dark bg-primary">

        <div class="container">

            <a class="navbar-brand fw-bold" href="/">
                CVVEN
            </a>

        </div>

    </nav>


    <!-- Contenu -->

    <main class="container py-5">

        <div class="text-center mb-4">

            <h1 class="text-success fw-bold">
                Réservation confirmée !
            </h1>

            <p class="text-muted">
                Votre réservation a bien été enregistrée.
            </p>

        </div>


        <div class="card shadow mx-auto" style="max-width: 700px;">

            <div class="card-header bg-primary text-white">

                <h2 class="h4 mb-0">
                    Récapitulatif de la réservation
                </h2>

            </div>


            <div class="card-body">

                <!-- Client -->

                <h3 class="h5 mb-3">
                    Informations du client
                </h3>

                <p>
                    <strong>Nom :</strong>
                    <?= esc($nomClient) ?>
                </p>

                <p>
                    <strong>Prénom :</strong>
                    <?= esc($prenomClient) ?>
                </p>


                <hr>


                <!-- Séjour -->

                <h3 class="h5 mb-3">
                    Informations du séjour
                </h3>

                <p>
                    <strong>Village :</strong>
                    <?= esc($village['nom']) ?>
                </p>

                <p>
                    <strong>Chambre :</strong>
                    <?= esc($chambre['nom']) ?>
                </p>

                <p>
                    <strong>Date d'arrivée :</strong>
                    <?= esc($dateArrivee) ?>
                </p>

                <p>
                    <strong>Date de départ :</strong>
                    <?= esc($dateDepart) ?>
                </p>

                <p>
                    <strong>Nombre de nuits :</strong>
                    <?= esc($nombreNuits) ?>
                </p>

                <p>
                    <strong>Nombre de chambres :</strong>
                    <?= esc($nombreChambres) ?>
                </p>


                <hr>


                <!-- Prix -->

                <p class="fs-4 fw-bold text-success">

                    <strong>Prix total :</strong>
                    <?= esc($prixTotal) ?> €

                </p>

            </div>


            <div class="card-footer text-center">

                <a href="/reservations" class="btn btn-primary">
                    Voir les réservations
                </a>

                <a href="/villages" class="btn btn-outline-secondary ms-2">
                    Retour aux villages
                </a>

            </div>

        </div>

    </main>


    <!-- Pied de page -->

    <footer class="bg-dark text-white text-center py-4 mt-5">

        <p class="mb-0">
            © 2026 CVVEN - Tous droits réservés
        </p>

    </footer>


    <!-- Bootstrap JavaScript -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>
