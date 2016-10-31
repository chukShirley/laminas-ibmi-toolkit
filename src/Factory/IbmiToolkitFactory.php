<?php
namespace ZfIbmiToolkit;

use Interop\Container\ContainerInterface;
use ToolkitApi\Toolkit;
use Zend\Db\Adapter\Adapter;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceManager;

/**
 * Class IbmiToolkitFactory
 * @package ZfIbmiToolkit
 */
final class IbmiToolkitFactory implements FactoryInterface 
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return Toolkit
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ServiceManager $container **/

        /** @var Adapter $databaseAdapter */
        $databaseAdapter = $container->get(Adapter::class);
        $databaseConnectionResource = $databaseAdapter->getDriver()->getConnection()->getResource();

        $toolkit = new Toolkit(
            $databaseConnectionResource,
            '0'
        );


        return $toolkit;
    }
}
