<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;

class ProductController extends CoreController
{
    /**
     * Méthode s'occupant de l'affichage du formulaire d'ajout
     *
     * @return void
     */
    public function add()
    {
        // Préparer les données ( = en général les récupérer depuis la BDD )
        $allCategoryList = Category::findAll();

        // TODO dynamiser les listes de catégorie, marque et type
        // On appelle la méthode show() de l'objet courant
        $this->show('product/add', [
            'allCategoryList' => $allCategoryList,
        ]);
    }

    /**
     * Traite le formulaire d'ajout
     *
     * @return void
     */
    public function addExecute()
    {
        // récupérer les données
        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description');
        $picture = filter_input(INPUT_POST, 'picture', FILTER_VALIDATE_URL);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $rate = filter_input(INPUT_POST, 'rate', FILTER_VALIDATE_INT);
        $status = filter_input(INPUT_POST, 'status', FILTER_VALIDATE_INT);
        $categoryId = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        $brandId = filter_input(INPUT_POST, 'brand_id', FILTER_VALIDATE_INT);
        $typeId = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);

        // dump($_POST);
        // dd($name,
        // $description,
        // $picture,
        // $price,
        // $rate,
        // $status,
        // $categoryId,
        // $brandId,
        // $typeId);
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
        $objectToInsert = new Product();

        // que l'on rempli ( on l'hydrate ) avec les données saisies par l'utilisateur
        $objectToInsert->setName($name);
        $objectToInsert->setDescription($description);
        $objectToInsert->setPicture($picture);
        $objectToInsert->setPrice($price);
        $objectToInsert->setRate($rate);
        $objectToInsert->setStatus($status);
        $objectToInsert->setCategoryId($categoryId);
        $objectToInsert->setBrandId($brandId);
        $objectToInsert->setTypeId($typeId);

        // on lance la requête d'insertion
        // si une erreur est survenue, on ne fait pas de redirection 
        // pour que l'on puisse avoir le message d'erreur
        if (! $objectToInsert->insert())
        {
            die();
        }

        // une fois le formulaire traité on redirige l'utilisateur
        $this->redirectToRoute('product-browse');

    }

    /**
     * Méthode s'occupant de l'affichage de la liste 
     *
     * @return void
     */
    public function browse()
    {
        // Préparer les données ( = en général les récupérer depuis la BDD )
        $allProductList = Product::findAll();

        // On appelle la méthode show() de l'objet courant
        $this->show('product/browse', [
            'productList' => $allProductList,
        ]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $allCategoryList = Category::findAll();
        $allBrandList = Brand::findAll();
        $allTypeList = Type::findAll();

        $this->show('product/edit', [
            'product' => $product,
            'allCategoryList' => $allCategoryList,
            'allBrandList' => $allBrandList,
            'allTypeList' => $allTypeList,
        ]);
    }

    public function editExecute($id)
    {
        // récupérer les données
        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description');
        $picture = filter_input(INPUT_POST, 'picture', FILTER_VALIDATE_URL);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $rate = filter_input(INPUT_POST, 'rate', FILTER_VALIDATE_INT);
        $status = filter_input(INPUT_POST, 'status', FILTER_VALIDATE_INT);
        $categoryId = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        $brandId = filter_input(INPUT_POST, 'brand_id', FILTER_VALIDATE_INT);
        $typeId = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);

        // NTUI ( nettoyage / validation des données )
        // TODO traiter les erreurs

        // traiter le formulaire
        // dans ce cas update en BDD

        // on crée un modèle 
        $objectToUpdate = Product::find($id);

        // que l'on rempli ( on l'hydrate ) avec les données saisies par l'utilisateur
        $objectToUpdate->setName($name);
        $objectToUpdate->setDescription($description);
        $objectToUpdate->setPicture($picture);
        $objectToUpdate->setPrice($price);
        $objectToUpdate->setRate($rate);
        $objectToUpdate->setStatus($status);
        $objectToUpdate->setCategoryId($categoryId);
        $objectToUpdate->setBrandId($brandId);
        $objectToUpdate->setTypeId($typeId);

        // on lance la requête d'insertion
        // si une erreur est survenue, on ne fait pas de redirection 
        // pour que l'on puisse avoir le message d'erreur
        if (! $objectToUpdate->save())
        {
            die();
        }

        // une fois le formulaire traité on redirige l'utilisateur
        $this->redirectToRoute('product-browse');
    }

    function demoAbstract(){}
}
