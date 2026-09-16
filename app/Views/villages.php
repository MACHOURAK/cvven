<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Nos Villages - CVVEN</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <h1>Nos villages de vacances</h1>

    <p>Bienvenue sur la page des villages du CVVEN.</p>


    <?php

    $villages = [
        [
            "nom" => "Les Rousses",
            "departement" => "Jura",
            "image" => "les-rousses.jpg",
            "slug" => "les-rousses",
        ],
        [
            "nom" => "La Rochelle",
            "departement" => "Charente-Maritime",
            "image" => "la-rochelle.jpg",
            "slug" => "la-rochelle",
        ],
        [
            "nom" => "Saint-Antheme",
            "departement" => "Puy-de-Dôme",
            "image" => "saint-antheme.jpg",
            "slug" => "saint-antheme",
        ],
        [
            "nom" => "Villefort",
            "departement" => "Lozère",
            "image" => "villefort.jpg",
            "slug" => "villefort",
        ]
    ];

    ?>


    <div class="container">

        <div class="row">

            <?php foreach ($villages as $village): ?>

                <div class="col-md-6 col-lg-3 mb-4">

                    <div class="card h-100">

                        <img src="/images/<?= $village['image'] ?>" 
                             class="card-img-top" 
                             alt="<?= $village['nom'] ?>">

                        <div class="card-body">

                            <h5 class="card-title">
                                <?= $village['nom'] ?>
                            </h5>

                            <p class="card-text">
                                Département : <?= $village['departement'] ?>
                            </p>

                            <a href="/villages/<?= $village['slug'] ?>" class="btn btn-primary">
                                Voir le village
                            </a>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</body>

</html>