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

    /**
     * Méthode s'occupant de l'affichage de la page d'authentification
     *
     * @return void
     */
    public function browseComplete()
    {
        // Récupération
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        // Controle
        if (!$email) {
            exit("E-mail erroné");
        }

        // Vérification des accès
        $appUser = AppUser::findByEmail($email);
        $appUserPasword = $appUser->getPassword();
        if ($password === $appUserPasword) {
            // echo "OK !";
            $_SESSION["userId"] = $appUser->getId();
            $_SESSION["userObject"] = $appUser;
            $this->redirectToRoute('main-home');
            exit;
        } else {
            echo "Quelle mémoire de poisson rouge !";
        }
    }
}
