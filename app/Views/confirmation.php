<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Confirmation - CVVEN</title>
</head>

<body>

    <h1>Réservation confirmée</h1>

    <p>
        Votre réservation a bien été enregistrée.
    </p>

    <h2>Récapitulatif</h2>

    <p>
        <strong>Village :</strong>
        <?= $village['nom'] ?>
    </p>

    <p>
        <strong>Chambre :</strong>
        <?= $chambre['nom'] ?>
    </p>

    <p>
        <strong>Date d'arrivée :</strong>
        <?= $dateArrivee ?>
    </p>

    <p>
        <strong>Date de départ :</strong>
        <?= $dateDepart ?>
    </p>

    <p>
        <strong>Nombre de chambres :</strong>
        <?= $nombreChambres ?>
    </p>

    <p>
        <strong>Prix total :</strong>
        <?= $prixTotal ?> €
    </p>

    <br>

    <a href="/villages">
        Retour aux villages
    </a>

</body>

</html>