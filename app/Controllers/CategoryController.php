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

        // TODO se débarasser de ce global !!!!
        global $router;
        // une fois le formulaire traité on redirige l'utilisateur
        header('Location: ' . $router->generate('category-browse'));

        exit;
        // dump($categoryToInsert);
        // dd($_POST);
    }

    public function edit($params)
    {
        $modelCategory = new Category;
        $categoryToEdit = $modelCategory->find($params);


        global $router;

        $this->show("category/edit",
                    [
                        "categoryToEdit" => $categoryToEdit
                    ]);
    }

    public function editExecute($params)
    {
        $name = filter_input(INPUT_POST, 'name');
        $subtitle = filter_input(INPUT_POST, 'subtitle');
        $picture = filter_input(INPUT_POST, 'picture', FILTER_VALIDATE_URL);

        $modelCategory = new Category;
        $categoryToEdit = $modelCategory->find($params);

        $categoryToEdit->setName($name);
        $categoryToEdit->setSubtitle($subtitle);
        $categoryToEdit->setPicture($picture);

        $categoryToEdit->update();

        global $router;
        header('Location: ' . $router->generate('category-browse'));

        exit;
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
}
