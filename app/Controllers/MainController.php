<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;

// Si j'ai besoin du Model Category
// use App\Models\Category;

class MainController extends CoreController
{
    /**
     * Méthode s'occupant de la page d'accueil
     *
     * @return void
     */
    public function home()
    {
        // On appelle la méthode show() de l'objet courant
        // En argument, on fournit le fichier de Vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du Controller
        $this->show('main/home');
    }

    public function category()
    {
        $modelCategory = new Category;
        $categoriesList = $modelCategory->findAll();

        $this->show('main/category',
                    [
                        "categoriesList" => $categoriesList
                    ]);
    }

    public function categoryAdd()
    {
        $this->show('main/category_add');
    }

    public function product()
    {
        $modelProduct = new Product;
        $productsList = $modelProduct->findAll();
        
        $this->show('main/product',
                    [
                        "productsList" => $productsList
                    ]);
    }

    public function productAdd()
    {
        $this->show('main/product_add');
    }
}
