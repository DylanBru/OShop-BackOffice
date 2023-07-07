# Routes


| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | | 5 categories + liste des produits appartenant à ces catégories permettant de controler les catégories à afficher| - |
| `/authentification` | `POST` | `AuthController` | `authentification` | authentification | fenêtre qui permet de s'authentifier avec un champ id et modt de passe | - |
| `/categories` | `GET` | `MainController` | `category` | Catégories | liste des catégories | - |
| `/products` | `GET` | `MainController` | `product` | Products | liste des produits | - |
| `/types` | `GET` | `MainController` | `type` | Types | liste des types | - |
| `/brand` | `GET` | `MainController` | `brand` | Marques | liste des marques | - |
| `/tags` | `GET` | `MainController` | `Tags` | Tags | liste des Tags | - |
| `/categories_add` | `GET` | `MainController` | `category_add` | Catégory_add | - | ajouter une catégorie |
| `/products_add` | `GET` | `MainController` | `product_add` | Product_add | - | ajouter un produit |
| `/types_add` | `GET` | `MainController` | `type_add` | Type_add | - | ajouter un type |
| `/brand_add` | `GET` | `MainController` | `brand_add` | Marque_add | - | ajouter une marque |
| `/tags_add` | `GET` | `MainController` | `Tags_add` | Tag_add | - | ajouter un tag |