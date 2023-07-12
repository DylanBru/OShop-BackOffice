
<div class="container my-4">
    <a href="<?= $router->generate('main-home'); ?>" class="btn btn-success float-end">Retour</a>
    <h2>Authentification</h2>

    <form action="" method="POST" class="mt-5">
        <?php if (!empty($errorList)) {
            foreach ($errorList as $error) {
        ?>
                <div class="alert alert-danger" role="alert">
                    <?=$error?>
                </div>
        <?php
            }
        }?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="votre e-mail">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de Passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="votre mot de passe">
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary mt-5">Se connecter</button>
        </div>
    </form>
</div>
