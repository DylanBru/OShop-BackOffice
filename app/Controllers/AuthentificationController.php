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
     * Méthode s'occupant de la connection d'un utilisateur
     *
     * @return void
     */
    public function browseComplete()
    {
        // Récupération
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        // Controle
        $errorList = [];


        // Vérification des accès
        $appUser = AppUser::findByEmail($email);

        if (!$appUser) {
            $errorList[] = "E-mail erroné";
            $this->show('authentification/browse', [
                'errorList' => $errorList
            ]);
            exit;
        }

        $appUserPasword = $appUser->getPassword();
        if ($password === $appUserPasword) {
            // echo "OK !";
            $_SESSION["userId"] = $appUser->getId();
            $_SESSION["userObject"] = $appUser;
            $this->redirectToRoute('main-home');
            exit;
        } else {
            $errorList[] = "Ceci n'est pas le bon mot de passe";
            $this->show('authentification/browse', [
                'errorList' => $errorList
            ]);
            exit;
        }
    }
}