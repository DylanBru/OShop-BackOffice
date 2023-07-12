<?php

namespace App\Models;

use App\Utils\Database;

// Classe mère de tous les Models
// On centralise ici toutes les propriétés et méthodes utiles pour TOUS les Models
abstract class CoreModel
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $created_at;
    /**
     * @var string
     */
    protected $updated_at;


    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of created_at
     *
     * @return  string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     *
     * @return  string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /* 
    En ajoutant les méthodes abstraites dans le CoreModel
    On force tout les développeurs qui créeront des models 
    à écrire le code de ces fonctions
    */
    // Exemple de factorisation avancée avec des abstract
    // abstract static protected function getDbTableName();
    // public function findFacto($id)
    // {
    //     // se connecter à la BDD
    //     $pdo = Database::getPDO();

    //     // écrire notre requête
    //     $sql = '
    //         SELECT *
    //         FROM ' . $this->getDbTableName() . '
    //         WHERE id = ' . $id;

    //     // exécuter notre requête
    //     $pdoStatement = $pdo->query($sql);

    //     // un seul résultat => fetchObject
    //     $brand = $pdoStatement->fetchObject(self::class);

    //     // retourner le résultat
    //     return $brand;
    // }
    abstract public static function find(int $id); 
    abstract public static function findAll();
    abstract public function insert();
    abstract public function update();
    // abstract public function delete();

    public function save()
    {
        if (is_null($this->id))
        {
            return $this->insert();
        }
        else
        {
            return $this->update();
        }
    }

}
