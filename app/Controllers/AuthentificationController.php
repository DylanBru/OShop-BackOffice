<?php

namespace App\Controllers;

use App\Models\AppUser;

class AuthentificationController extends CoreController
{
    /**
     * Méthode s'occupant de l'affichage de la page d'authentification
     *
     * @return void
     */
    public function browse()
    {
        $allAppUserList = AppUser::findAll();

        $this->show('authentification/browse', [
            'allAppUserList' => $allAppUserList
        ]);
    }
}
