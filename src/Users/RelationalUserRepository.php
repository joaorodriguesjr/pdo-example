<?php

namespace Users;

use PDO;

class RelationalUserRepository implements UserRepository
{
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * @param \PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param \Users\User $user
     */
    public function persist(User $user)
    {
        $stmt = $this->pdo->prepare('INSERT INTO users (name, password) VALUES (:name, :password)');
        $stmt->bindValue('name', $user->getName());
        $stmt->bindValue('password', $user->getPassword());
        $stmt->execute();

        $user->defineID($this->pdo->lastInsertId());
    }
}
