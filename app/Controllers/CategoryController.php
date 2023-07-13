<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController extends CoreController
{
    /**
     * Méthode s'occupant de l'affichage du formulaire d'ajout
     *
     * @return void
     */
    public function add()
    {
        $this->checkAuthorization(['admin']);
        // Préparer les données ( = en général les récupérer depuis la BDD )

        // On appelle la méthode show() de l'objet courant
        $this->show('category/add');
    }

    /**
     * Traite le formulaire d'ajout
     *
     * @return void
     */
    public function addExecute()
    {
        // récupérer les données
        // if (isset($name) && !empty($name))
        // $name = $_POST['name'];
        $name = filter_input(INPUT_POST, 'name');
        $subtitle = filter_input(INPUT_POST, 'subtitle');
        $picture = filter_input(INPUT_POST, 'picture', FILTER_VALIDATE_URL);

        // dump($name,
        // $subtitle,
        // $picture);
        // NTUI ( nettoyage / validation des données )
        // Les validations faites cotés FRONT ( dans le navigateur ) peuvent toutes être contournées
        // Il FAUT vérifier les données cotés back
        //  - la cohérence des données ( est ce que les données sont valides )
        //  - la complétude ? des données ( est ce qu'on a toutes les données nécessaires )
        //  - est ce la ligne existe en BDD ?
        // TODO traiter les erreurs

        // traiter le formulaire
        // dans ce cas insérer en BDD

        // on crée un modèle 
        $categoryToInsert = new Category();

        // que l'on rempli ( on l'hydrate ) avec les données saisies par l'utilisateur
        $categoryToInsert->setName($name);
        $categoryToInsert->setSubtitle($subtitle);
        $categoryToInsert->setPicture($picture);

        // on lance la requête d'insertion
        $categoryToInsert->insert();

        global $router;
        // une fois le formulaire traité on redirige l'utilisateur
        $this->redirectToRoute('category-browse');

        exit;
        // dump($categoryToInsert);
        // dd($_POST);
    }

    /**
     * Méthode s'occupant de l'affichage de la liste des catégories
     *
     * @return void
     */
    public function browse()
    {
        // Préparer les données ( = en général les récupérer depuis la BDD )
        $allCategoryList = Category::findAll();
        // dd($allCategoryList);

        // On appelle la méthode show() de l'objet courant
        $this->show('category/browse', [
            'categoryList' => $allCategoryList
        ]);
    }

    /**
     * Méthode s'occupant de l'affichage du formulaire de mise à jour
     *
     * @param int $id
     * @return void
     */
    public function edit(int $id)
    {
        // préparation des données
        $category = Category::find($id);

        // affichage de la vue
        $this->show('category/edit', [
            'category' => $category,
        ]);
    }

    /**
     * Méthode s'occupant du traitement du formulaire de mise à jour
     *
     * @param int $id
     * @return void
     */
    public function editExecute(int $id)
    {
        // 1 - récupérer les données
        $name = filter_input(INPUT_POST, 'name');
        $subtitle = filter_input(INPUT_POST, 'subtitle');
        $picture = filter_input(INPUT_POST, 'picture', FILTER_VALIDATE_URL);

        // 2 - valider / nettoyer les données
        if (strlen($name) === 0)
        {
            // die arrête l'exécution du code
            // on gérera les erreurs plus tard
            die('Nom manquant');
        }
        if ($picture === false)
        {
            die('L\'image doit etre une url complète');
        }

        // 3 - traiter le formulaire

        // on récupère l'objet de la BDD
        $categoryToUpdate = Category::find($id);

        // puis on le rempli ( on l'hydrate ) avec les données saisies par l'utilisateur
        $categoryToUpdate->setName($name);
        $categoryToUpdate->setSubtitle($subtitle);
        $categoryToUpdate->setPicture($picture);

        // et on le sauvegarde en BDD
        $categoryToUpdate->save();

        // 4 - rediriger l'utilisateur
        $this->redirectToRoute('category-browse');

    }

    /**
     * supprime un enregistrement en BDD
     *
     * @return void
     */
    public function delete($id)
    {
        Category::delete($id);

        $this->redirectToRoute('category-browse');
    }

    public function demoAbstract()
    {
        
    }
}
