<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un village - CVVEN</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container py-5">

    <h1 class="mb-4">Ajouter un village</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <form action="/admin/villages/enregistrer" method="post">

        <div class="mb-3">
            <label class="form-label">Nom</label>

            <input
                type="text"
                name="nom"
                class="form-control"
                value="<?= old('nom') ?>"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Département</label>

            <input
                type="text"
                name="departement"
                class="form-control"
                value="<?= old('departement') ?>"
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>

            <input
                type="text"
                name="image"
                class="form-control"
                value="<?= old('image') ?>"
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Slug</label>

            <input
                type="text"
                name="slug"
                class="form-control"
                value="<?= old('slug') ?>"
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>

            <textarea
                name="description"
                class="form-control"
                rows="5"
            ><?= old('description') ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Enregistrer
        </button>

        <a href="/admin/villages" class="btn btn-secondary">
            Annuler
        </a>

    </form>

</div>

</body>
</html>
