<?php

namespace App\Models;

use App\Utils\Database;

class AppUser extends CoreModel
{
    private $email;
    private $password;
    private $firstname;
    private $lastname;
    private $role;
    private $status;
    

    // actuellement, aucune méthode du Model AppUser ne permet une recherche par email
    // coder la méthode statique findByEmail($email)
    // si on trouve un résultat pour l'email, retourner une instance de AppUser
    // sinon, retourner false
    
    /**
     * Recherche un utilisateur par son email
     *
     * @param string $email
     * @return AppUser|boolean
     */
    public static function findByEmail(string $email)
    {
        // Récupération de l'objet PDO représentant la connexion à la DB
        $pdo = Database::getPDO();

        // Ecriture de la requête INSERT INTO
        $sql = "
            SELECT * FROM `app_user`
            WHERE email = :email;
        ";

        // Préparation de la requête
        $preparedQuery = $pdo->prepare($sql);

        $preparedQuery->execute([':email' => $email]);

        // un seul résultat => fetchObject
        // __CLASS__ et self::class contiennent le FQCN de la classe actuelle;
        $appUser = $preparedQuery->fetchObject(self::class);

        // retourner le résultat
        return $appUser;

    } 

    public static function find(int $id)
    {

    } 
    public static function findAll()
    {

    }
    public function insert()
    {

    }
    public function update()
    {

    }


    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
