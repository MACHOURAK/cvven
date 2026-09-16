<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier une réservation - CVVEN</title>

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

                <a class="nav-link" href="/reservations">
                    Réservations
                </a>

            </div>

        </div>
    </nav>


    <!-- Formulaire -->
    <main class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card shadow-sm">

                    <div class="card-body">

                        <h1 class="h3 text-center mb-4">
                            Modifier la réservation
                        </h1>


                        <form action="/reservation/modifier/<?= $reservation['id'] ?>" method="post">

                            <!-- Date d'arrivée -->
                            <div class="mb-3">

                                <label for="date_arrivee" class="form-label">
                                    Date d'arrivée
                                </label>

                                <input
                                    type="date"
                                    id="date_arrivee"
                                    name="date_arrivee"
                                    class="form-control"
                                    value="<?= $reservation['date_arrivee'] ?>"
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
                                    id="date_depart"
                                    name="date_depart"
                                    class="form-control"
                                    value="<?= $reservation['date_depart'] ?>"
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
                                    id="nombre_chambres"
                                    name="nombre_chambres"
                                    class="form-control"
                                    min="1"
                                    value="<?= $reservation['nombre_chambres'] ?>"
                                    required
                                >

                            </div>


                            <!-- Boutons -->
                            <div class="d-flex gap-2">

                                <button type="submit" class="btn btn-primary">
                                    Enregistrer les modifications
                                </button>

                                <a href="/reservations" class="btn btn-secondary">
                                    Annuler
                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

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