<?php

namespace Instances;

use PDO;
use Users\UsersWriteService;
use Users\RelationalUserRepository;

class Container
{
    /**
     * @return \PDO
     */
    private static function getPDO()
    {
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        return new PDO('mysql:dbname=test;charset=utf8', 'root', 'root', $options);
    }

    /**
     * @return \Users\RelationalUserRepository
     */
    private static function getUserRepository()
    {
        return new RelationalUserRepository(self::getPDO());
    }

    /**
     * @return \Users\UsersWriteService
     */
    public static function getUsersWriteService()
    {
        return new UsersWriteService(self::getUserRepository());
    }
}
