<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $village['nom'] ?> - CVVEN</title>
</head>

<body>

    <h1><?= $village['nom'] ?></h1>

    <img
        src="/images/<?= $village['image'] ?>"
        alt="<?= $village['nom'] ?>"
    >

    <p>
        Département : <?= $village['departement'] ?>
    </p>

    <p>
        Description : <?= $village['description'] ?>
    </p>

    <p>
        <strong>Adresse :</strong>
        <?= $village['adresse'] ?>
    </p>

    <p>
        <strong>Capacité :</strong>
        <?= $village['capacite'] ?>
    </p>


    <h2>Types de chambres</h2>

    <ul>

        <?php foreach ($village['chambres'] as $chambre): ?>

            <li>

                <strong><?= $chambre['nom'] ?></strong>
                -
                <?= $chambre['capacite'] ?>
                -
                <?= $chambre['prix'] ?> €

                <form action="/reservation" method="get">

                    <input
                        type="hidden"
                        name="village_id"
                        value="<?= $village['id'] ?>"
                    >

                    <input
                        type="hidden"
                        name="chambre_id"
                        value="<?= $chambre['id'] ?>"
                    >

                    <button type="submit">
                        Choisir cette chambre
                    </button>

                </form>

            </li>

        <?php endforeach; ?>

    </ul>


    <h2>Services</h2>

    <ul>

        <?php foreach ($village['services'] as $service): ?>

            <li>
                <?= $service['nom'] ?>
            </li>

        <?php endforeach; ?>

    </ul>


    <br>

    <a href="/reservations">
        Voir les réservations
    </a>

    <br>
    <br>

    <a href="/villages">
        Retour aux villages
    </a>

</body>

</html>