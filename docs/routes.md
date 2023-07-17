# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Bienvenue dans le backoffice | displays last 3 updated appusers and categories | - |
| `/category/` | `GET` | `CategoryController` | `browse` | Liste des catégories | shows all categories | - |
| `/category/read/[i:id]` | `GET` | `CategoryController` | `read` | Détail de la catégorie [NOM de la Catégorie] | shows details of one category | TODO + id = category ID in DB |
| `/category/edit/[i:id]` | `GET` | `CategoryController` | `edit` | Modification de la catégorie [NOM de la Catégorie] | displays update form of one category | id = category ID in DB |
| `/category/edit/[i:id]` | `POST` | `CategoryController` | `editExecute` | - | update one category in DB | id = category ID in DB |
| `/category/add` | `GET` | `CategoryController` | `add` | Ajout d'une catégorie | shows add form of a category | - |
| `/category/add` | `POST` | `CategoryController` | `addExecute` | - | insert one category in DB | - |
| `/category/delete/[i:id]` | `GET` | `CategoryController` | `delete` | - | delete one category | id = category ID in DB |
| `/product/` | `GET` | `ProductController` | `browse` | Liste des produits | shows all products | - |
| `/product/read/[i:id]` | `GET` | `ProductController` | `read` | Détail du produit [NOM du Produit] | shows details of one product | TODO + id = product ID in DB |
| `/product/edit/[i:id]` | `GET` | `ProductController` | `edit` | Modification du produit [NOM du Produit] | displays update form of one product | id = product ID in DB |
| `/product/edit/[i:id]` | `POST` | `ProductController` | `editExecute` | - | update one product in DB | id = product ID in DB |
| `/product/add` | `GET` | `ProductController` | `add` | Ajout d'un produit | shows add form of a product | - |
| `/product/add` | `POST` | `ProductController` | `addExecute` | - | insert one product in DB | - |
| `/product/delete/[i:id]` | `GET` | `ProductController` | `delete` | - | delete one product | id = product ID in DB |
| `/user/` | `GET` | `AppUserController` | `browse` | Liste des utilisateurs | shows all appusers | - |
| `/user/read/[i:id]` | `GET` | `AppUserController` | `read` | Détail d'un utilisateur [NOM d'un utilisateur] | shows details of one appuser | TODO + id = appuser ID in DB |
| `/user/edit/[i:id]` | `GET` | `AppUserController` | `edit` | Modification d'un utilisateur [NOM d'un utilisateur] | displays update form of one appuser | id = appuser ID in DB |
| `/user/edit/[i:id]` | `POST` | `AppUserController` | `editExecute` | - | update one appuser in DB | id = appuser ID in DB |
| `/user/add` | `GET` | `AppUserController` | `add` | Ajout d'un utilisateur | shows add form of a appuser | - |
| `/user/add` | `POST` | `AppUserController` | `addExecute` | - | insert one appuser in DB | - |
| `/user/delete/[i:id]` | `GET` | `AppUserController` | `delete` | - | delete one appuser | id = appuser ID in DB |
| `/login` | `GET` | `MainController` | `login` | Log in | display the login form | - |
| `/login` | `POST` | `MainController` | `loginExecute` | - | log in the user | - |
| `/logout` | `GET` | `MainController` | `logout` | - | log out the user | - |
