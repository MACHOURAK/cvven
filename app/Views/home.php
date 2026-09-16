<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CVVEN - Accueil</title>

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

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="/">
                            Accueil
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/villages">
                            Nos villages
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/reservations">
                            Voir les réservations
                        </a>
                    </li>

                </ul>

            </div>

        </div>
    </nav>


    <!-- Section principale -->
    <section class="bg-light py-5">

        <div class="container text-center">

            <h1 class="display-4 fw-bold">
                Bienvenue au CVVEN
            </h1>

            <p class="lead mt-3">
                Réservez votre séjour dans nos villages de vacances.
            </p>

            <a href="/villages" class="btn btn-primary btn-lg mt-3">
                Découvrir nos villages
            </a>

            <a href="/reservations" class="btn btn-outline-primary btn-lg mt-3 ms-2">
                Voir les réservations
            </a>

        </div>

    </section>


    <!-- Présentation -->
    <section class="py-5">

        <div class="container">

            <h2 class="text-center mb-4">
                Nos villages de vacances
            </h2>

            <div class="row g-4">


                <!-- Les Rousses -->
                <div class="col-md-6 col-lg-3">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center">

                            <h5 class="card-title">
                                Les Rousses
                            </h5>

                            <p class="card-text">
                                Découvrez notre village situé dans le Jura.
                            </p>

                            <a href="/villages/les-rousses"
                               class="btn btn-outline-primary">
                                Découvrir
                            </a>

                        </div>

                    </div>

                </div>


                <!-- La Rochelle -->
                <div class="col-md-6 col-lg-3">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center">

                            <h5 class="card-title">
                                La Rochelle
                            </h5>

                            <p class="card-text">
                                Profitez d'un séjour en Charente-Maritime.
                            </p>

                            <a href="/villages/la-rochelle"
                               class="btn btn-outline-primary">
                                Découvrir
                            </a>

                        </div>

                    </div>

                </div>


                <!-- Saint-Anthème -->
                <div class="col-md-6 col-lg-3">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center">

                            <h5 class="card-title">
                                Saint-Anthème
                            </h5>

                            <p class="card-text">
                                Un village situé au cœur du Puy-de-Dôme.
                            </p>

                            <a href="/villages/saint-antheme"
                               class="btn btn-outline-primary">
                                Découvrir
                            </a>

                        </div>

                    </div>

                </div>


                <!-- Villefort -->
                <div class="col-md-6 col-lg-3">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center">

                            <h5 class="card-title">
                                Villefort
                            </h5>

                            <p class="card-text">
                                Découvrez la Lozère et ses paysages.
                            </p>

                            <a href="/villages/villefort"
                               class="btn btn-outline-primary">
                                Découvrir
                            </a>

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </section>


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