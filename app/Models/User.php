<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class User extends CoreModel
{
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $firstname;
    /**
     * @var string
     */
    private $lastname;
    /**
     * @var string
     */
    private $role;
    /**
     * @var int
     */
    private $status;


    /**
     * Mets à jour l'enregistrement en BDD
     *
     * @return void
     */
    public function update()
    {
        $pdo = Database::getPDO();

        $sql = "
            UPDATE `category` 
            SET
                email = :email
                password = :password
                firstname = :firstname
                lastname = :lastname
                role = :role
                status = :status
            WHERE id = :id
        ";

        $preparedQuery = $pdo->prepare($sql);

        $queryIsSuccessful = $preparedQuery->execute([
            ':email' => $this->email,
            ':password' => $this->password,
            ':firstname' => $this->firstname,
            ':lastname' => $this->lastname,
            ':role' => $this->role,
            ':status' => $this->status
        ]);
        return $queryIsSuccessful;
    }


    /**
     * Méthode permettant d'ajouter un enregistrement dans la BDD
     * L'objet courant doit contenir toutes les données à ajouter : 1 propriété => 1 colonne dans la table
     *
     * @return bool
     */
    public function insert() :bool
    {
        $pdo = Database::getPDO();

        $sql = "
            INSERT INTO `app_user` (email, password, firstname, lastname, role, status, created_at)
            VALUES (:email, :password, :firstname, :lastname, :role, :status, now());
        ";

        $preparedQuery = $pdo->prepare($sql);


        $queryIsSuccessful = $preparedQuery->execute([
            ':email' => $this->email,
            ':password' => $this->password,
            ':firstname' => $this->firstname,
            ':lastname' => $this->lastname,
            ':role' => $this->role,
            ':status' => $this->status,

        ]);

        if ($queryIsSuccessful) {
            $this->id = $pdo->lastInsertId();

            return true;
        }

        return false;
    }

    /**
     * Méthode permettant de récupérer un enregistrement de la table app_user en fonction d'un id donné
     *
     * @param int $userId ID du user
     * @return User
     */
    public static function find($userId)
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `app_user` WHERE `id` =' . $userId;

        $pdoPrepare = $pdo->prepare($sql);

        $user = $pdoPrepare->fetchObject('App\Models\User');

        return $user;
    }

    /**
     * Méthode permettant de récupérer tous les enregistrements de la table app_user
     *
     * @return User[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `app_user`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\User');

        return $results;
    }


    


    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }


    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }


    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }


    public function getRole()
    {
        return $this->role;
    }

    public function setRole(string $role)
    {
        $this->role = $role;

        return $this;
    }


    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus(int $status)
    {
        $this->status = $status;

        return $this;
    }


    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }
}

