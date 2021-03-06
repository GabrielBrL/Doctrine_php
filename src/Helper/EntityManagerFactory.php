<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\ORMException;

class EntityManagerFactory {

    /**
     * @return EntityManagerInterface
     * @throws ORMException
     */
    public function getEntityManager(): EntityManagerInterface {
        $rootDir = __DIR__ . '/../..';

        $config = Setup::createAnnotationMetadataConfiguration(
                        [
                            $rootDir . '/src',
                        ],
                        true
        );

        $connection = [
            'dbname' => 'alura_doctrine',//Nome do banco, pode mudar.
            'user' => '',
            'password' => '',
            'host' => '',
            'driver' => 'pdo_mysql',
            'path' => $rootDir . '/var/data/banco.sql'
        ];
        return EntityManager::create($connection, $config);
    }

}
