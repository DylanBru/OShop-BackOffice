<?php 

namespace App\Controllers;

use App\Models\AppUser;

class AppUserController extends CoreController
{
    public function browse()
    {
        // préparation des données
        $allUserList = AppUser::findAll();

        // afficher la vue
        $this->show('appuser/browse', [
            'userList' => $allUserList,
        ]);
    }

    /**
     * Méthode s'occupant de l'affichage du formulaire d'ajout
     *
     * @return void
     */
    public function add()
    {
        // il sera utilisé pour préremplir des champs vide
        // sans avoir de message d'erreur
        $emptyUser = new AppUser();

        $crsfToken = uniqid('user-add');
        $_SESSION['token'] = $crsfToken;
        // On appelle la méthode show() de l'objet courant
        $this->show('appuser/add', [
            'user' => $emptyUser,
            'token' => $crsfToken,
        ]);
    }

    /**
     * Traite le formulaire d'ajout
     *
     * @return void
     */
    public function addExecute()
    {
        if (! array_key_exists('token', $_POST))
        {
            die('petit malandrin');
        }
        if ($_POST['token'] !== $_SESSION['token'])
        {
            die('petit malandrin tu te crois malin');
        }
        // récupérer les données
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $passwordClair = filter_input(INPUT_POST, 'password');
        $role = filter_input(INPUT_POST, 'role');
        $status = filter_input(INPUT_POST, 'status', FILTER_VALIDATE_INT, ["options" => ['min_range' => 1, 'max_range' => 2]]);

        $passwordHashed = password_hash($passwordClair, PASSWORD_DEFAULT);
        // dump($_POST);
        // dd($firstname,
        // $lastname,
        // $email,
        // $passwordClair,
        // $role,
        // $status);
        // NTUI ( nettoyage / validation des données )
        // TODO traiter les erreurs
        
        $errorList = [];
        if ($email === false)
        {
            $errorList[] = 'Merci de saisir un email valide';
        }

        if (strlen($passwordClair) < 8)
        {
            $errorList[] = 'Le mot de passe doit faire 8 caractères';
        }

        // si le mot de passe en majuscule == mot de passe fournit => il n'y pas de minuscule
        if (strtoupper($passwordClair) === $passwordClair)
        {
            $errorList[] = 'Le mot de passe doit contenir une lettre minuscule';
        }
        if(! preg_match('/[A-Z]/', $passwordClair))
        {
            $errorList[] = 'Le mot de passe doit contenir une lettre majuscule';
        }

        // traiter le formulaire
        // dans ce cas insérer en BDD

        // on crée un modèle 
        $objectToInsert = new AppUser();

        // que l'on rempli ( on l'hydrate ) avec les données saisies par l'utilisateur
        $objectToInsert
            ->setFirstname($firstname)
            ->setLastname($lastname);
        $objectToInsert->setEmail($email);
        $objectToInsert->setPassword($passwordHashed);
        $objectToInsert->setRole($role);
        $objectToInsert->setStatus($status);


        if (count($errorList) > 0)
        {
            $this->show('appuser/add', [
                'errorList' => $errorList,
                'user' => $objectToInsert
            ]);
            exit;
        }
        // on lance la requête d'insertion
        // si une erreur est survenue, on ne fait pas de redirection 
        // pour que l'on puisse avoir le message d'erreur
        if (! $objectToInsert->insert())
        {
            // ce die permet de voir les erreurs SQL dans le navigateur
            die('pb lors de l ajout');
        }

        // une fois le formulaire traité on redirige l'utilisateur
        $this->redirectToRoute('appuser-browse');

    }

    public function demoAbstract()
    {
        
    }
}