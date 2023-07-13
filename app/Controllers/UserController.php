<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends CoreController
{

     /**
     * Traite le formulaire d'ajout
     *
     * @return void
     */
    public function addExecute()
    {
        $this->checkAuthorization(['admin']);

        $lastname = filter_input(INPUT_POST, 'lastname');
        $firstname = filter_input(INPUT_POST, 'firstname');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $role = filter_input(INPUT_POST, 'role');
        $status = filter_input(INPUT_POST, 'status', FILTER_VALIDATE_INT);


        
        $userToInsert = new User();

        $userToInsert->setLastname($lastname);
        $userToInsert->setFirstname($firstname);
        $userToInsert->setEmail($email);
        $userToInsert->setPassword($password);
        $userToInsert->setRole($role);
        $userToInsert->setStatus($status);

        $userToInsert->insert();

        global $router;
        $this->redirectToRoute('user-browse');

        exit;
    }


    /**
     * Méthode s'occupant de l'affichage du formulaire d'ajout
     *
     * @return void
     */
    public function add()
    {
        $this->checkAuthorization(['admin']);
        $this->show('user/add');
    }


    /**
     * Méthode s'occupant de l'affichage de la liste des utilisateurs
     *
     * @return void
     */
    public function browse()
    {
        $this->checkAuthorization(['admin']);
        $allUserList = User::findAll();
        $this->show('user/browse', [
            'allUserList' => $allUserList
        ]);
    }

    public function demoAbstract()
    {}
}
