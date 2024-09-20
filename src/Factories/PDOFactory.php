<?php

namespace App\Factories;

use PDO;
use Psr\Container\ContainerInterface;

class PDOFactory
{
    public function __invoke(ContainerInterface $container): PDO
    {
        $settings = $container->get('settings');

        $dbSettings = $settings['db'];

       return new PDO($dbSettings['host'] . $dbSettings['name'], $dbSettings['user'],
           $dbSettings['password'], $dbSettings['options']);
    }
}