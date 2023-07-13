
<div class="container my-4">
    <a href="<?= $router->generate('user-browse'); ?>" class="btn btn-success float-end">Retour</a>
    <h2>Ajouter un utilisateur</h2>

    <form action="" method="POST" class="mt-5">
        <div class="mb-3">
            <label for="lastname" class="form-label">Nom</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nom de l'utilisateur">
        </div>
        <div class="mb-3">
            <label for="firstname" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Prénom de l'utilisateur">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email de l'utilisateur">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe de l'utilisateur">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select id="role" name="role" class="form-control" >
                <option value="catalog-manager"> catalog-manager </option>
                <option value="admin"> admin </option>
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-control" >
                <option value=0> - </option>
                <option value=1> Activé </option>
                <option value=0> Désactivé </option>
            </select>
        </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary mt-5">Valider</button>
        </div>
    </form>
</div>
