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
        $modelCategory = new Category;
        $categoriesListHomePage = $modelCategory->findAllHomepage();

        $modelProduct = new Product;
        $productsListHomePage = [];
        foreach ($categoriesListHomePage as $category) {
            $productsListHomePage[] = $modelProduct->findAllByCategory($category->getId());
        }
        // $productsListHomePage = $modelProduct->findAllByCategory(3);
        // dd($categoriesListHomePage, $productsListHomePage);

        $this->show('main/home',
                    [
                        "categoriesListHomePage" => $categoriesListHomePage,
                        "productsListHomePage" => $productsListHomePage
                    ]);
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
