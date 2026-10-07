<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gestion des villages - CVVEN</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Gestion des villages</h1>

        <div>
            <a href="/admin" class="btn btn-secondary">
                Retour admin
            </a>

            <a href="/admin/villages/ajouter" class="btn btn-primary">
                Ajouter un village
            </a>
        </div>

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

    <div class="table-responsive">

        <table class="table table-bordered table-striped align-middle">

            <thead class="table-primary">

                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Département</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

            <?php foreach ($villages as $village): ?>

                <tr>

                    <td><?= esc($village['id']) ?></td>

                    <td><?= esc($village['nom']) ?></td>

                    <td><?= esc($village['departement']) ?></td>

                    <td><?= esc($village['slug']) ?></td>

                    <td>

                        <a
                            href="/admin/villages/modifier/<?= $village['id'] ?>"
                            class="btn btn-warning btn-sm"
                        >
                            Modifier
                        </a>

                        <a
                            href="/admin/villages/supprimer/<?= $village['id'] ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Voulez-vous vraiment supprimer ce village ?');"
                        >
                            Supprimer
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>
