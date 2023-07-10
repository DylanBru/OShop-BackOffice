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
        $name = filter_input(INPUT_GET, 'name');
        $subtitle = filter_input(INPUT_GET, 'subtitle');
        $picture = filter_input(INPUT_GET, 'picture');

        var_dump($name, $subtitle, $picture);
        // On appelle la méthode show() de l'objet courant
        $this->show('category/add');
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
