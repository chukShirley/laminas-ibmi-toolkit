<?php

namespace LaminasIbmiToolkit\Factory;

use Interop\Container\ContainerInterface;
use ToolkitApi\Toolkit;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\ServiceManager\ServiceManager;

/**
 * Class IbmiToolkitFactory
 * @package ZfIbmiToolkit
 */
final class IbmiToolkitFactory implements FactoryInterface 
{
    /**
     * @param ContainerInterface|ServiceManager $container
     * @param string $requestedName
     * @param array|null $options
     * @return Toolkit
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var array $toolkitConfig */
        $toolkitConfig = $container->get('Config')['ibmi_toolkit'];

        if ($toolkitConfig['system']['transportType'] === 'pdo') {
            /** @var \PDO $resource */
            $toolkit = new Toolkit(
                $container->get($toolkitConfig['databaseAdapterService'])->getDriver()->getConnection()->getResource(),
                null,
                null,
                'pdo'
            );
        } else {
            $toolkit = new Toolkit(
                $container->get($toolkitConfig['databaseAdapterService'])->getDriver()->getConnection()->getResource(),
                1,
                null,
                null,
                true
            );
        }

        $toolkit->setOptions($toolkitConfig['system']);

        return $toolkit;
    }
}
