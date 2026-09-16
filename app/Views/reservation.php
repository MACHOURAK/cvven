<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Réservation - CVVEN</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body>


<!-- Navigation -->

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
                Villages
            </a>

        </div>

    </div>

</nav>



<main class="container py-5">


    <h1 class="text-center fw-bold mb-5">
        Réserver votre séjour
    </h1>



    <!-- Informations chambre -->

    <div class="card shadow mb-4">

        <div class="card-body">


            <h2 class="card-title text-primary">

                <?= $chambre['nom'] ?>

            </h2>


            <p>
                <strong>Village :</strong>
                <?= $village['nom'] ?>
            </p>


            <p>
                <strong>Capacité :</strong>
                <?= $chambre['capacite'] ?>
            </p>


            <p>
                <strong>Prix :</strong>
                <?= $chambre['prix'] ?> € / nuit
            </p>


            <p>

                <strong>Disponibilité :</strong>

                <?= $nombreDisponible ?> chambre(s) restante(s)

            </p>


        </div>

    </div>





    <?php if ($erreur): ?>


        <div class="alert alert-danger">

            <strong>Erreur :</strong>

            <?= $erreur ?>

        </div>


    <?php endif; ?>





    <!-- Formulaire -->


    <div class="card shadow">


        <div class="card-body">


            <form action="/reservation/confirm" method="post">



                <input type="hidden"
                       name="village_id"
                       value="<?= $villageId ?>">



                <input type="hidden"
                       name="chambre_id"
                       value="<?= $chambreId ?>">





                <div class="mb-3">


                    <label class="form-label">

                        Date d'arrivée

                    </label>


                    <input type="date"
                           class="form-control"
                           name="date_arrivee"
                           value="<?= $dateArrivee ?>"
                           required>

                </div>






                <div class="mb-3">


                    <label class="form-label">

                        Date de départ

                    </label>


                    <input type="date"
                           class="form-control"
                           name="date_depart"
                           value="<?= $dateDepart ?>"
                           required>


                </div>







                <div class="mb-3">


                    <label class="form-label">

                        Nombre de chambres

                    </label>


                    <input type="number"
                           class="form-control"
                           name="nombre_chambres"
                           value="<?= $nombreChambres ?? 1 ?>"
                           min="1"
                           max="<?= $nombreDisponible ?>"
                           required>


                </div>





                <button class="btn btn-primary">

                    Continuer la réservation

                </button>



            </form>


        </div>


    </div>









<?php if ($prixTotal !== null): ?>


<br>



<div class="card shadow border-success">


    <div class="card-body">


        <h2 class="text-success">

            Récapitulatif du séjour

        </h2>



        <p>

            <strong>Arrivée :</strong>

            <?= $dateArrivee ?>

        </p>



        <p>

            <strong>Départ :</strong>

            <?= $dateDepart ?>

        </p>




        <p>

            <strong>Durée :</strong>

            <?= $nombreNuits ?> nuit(s)

        </p>




        <p>

            <strong>Nombre de chambres :</strong>

            <?= $nombreChambres ?>

        </p>




        <h3>

            Prix total :
            <?= $prixTotal ?> €

        </h3>



    </div>


</div>



<?php endif; ?>






<br>


<a href="/villages" class="btn btn-outline-secondary">

    Retour aux villages

</a>



</main>





<footer class="bg-dark text-white text-center py-4">


<p class="mb-0">

© 2026 CVVEN - Tous droits réservés

</p>


</footer>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>


</html>