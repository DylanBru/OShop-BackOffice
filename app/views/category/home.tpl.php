
<div class="container my-4">
    <a href="<?= $router->generate('main-home'); ?>" class="btn btn-success float-end">Retour</a>
    <h2>Gestion de la page d'accueil</h2>

    <form action="" method="POST" class="mt-5">
    <div class="row">
        <?php foreach ($CategoryListForHomePage as $category) { ?>
            <div class="col-2">
                <div class="form-group">
                    <label for="emplacement1">Emplacement <?= $category->getHomeOrder() ?></label>
                    <select class="form-control" id="emplacement1" name="emplacement[]">
                    <?php foreach ($CategoryListForHomePage as $categoryToDrop) {?>
                                <option value="<?= $categoryToDrop->getHomeOrder() ?>" <?php if ($categoryToDrop->getHomeOrder() === $category->getHomeOrder()) { echo 'selected'; } ?>>
                                <?= $categoryToDrop->getName() ?>
                                </option>
                    <?php } ?>
                    </select>
                </div>
            </div>
        <?php } ?>
    <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
</form>