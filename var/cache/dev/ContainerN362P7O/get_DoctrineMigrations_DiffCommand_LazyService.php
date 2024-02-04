<?php

namespace ContainerN362P7O;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_DoctrineMigrations_DiffCommand_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.doctrine_migrations.diff_command.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.doctrine_migrations.diff_command.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('doctrine:migrations:diff', [], 'Generate a migration by comparing your current database to your mapping information.', false, #[\Closure(name: 'doctrine_migrations.diff_command', class: 'Doctrine\\Migrations\\Tools\\Console\\Command\\DiffCommand')] fn (): \Doctrine\Migrations\Tools\Console\Command\DiffCommand => ($container->privates['doctrine_migrations.diff_command'] ?? $container->load('getDoctrineMigrations_DiffCommandService')));
    }
}
