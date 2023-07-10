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
        // On appelle la méthode show() de l'objet courant
        $this->show('category/add');
    }
    
    public function getPost()
    {
        $name = filter_input(INPUT_POST, 'name');
        $subtitle = filter_input(INPUT_POST, 'subtitle');
        $picture = filter_input(INPUT_POST, 'picture');
        
        $categoryModel = new Category;
        $categoryModel->setName("$name");
        $categoryModel->setSubtitle("$subtitle");
        $categoryModel->setPicture("$picture");

        $categoryModel->insert();
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
