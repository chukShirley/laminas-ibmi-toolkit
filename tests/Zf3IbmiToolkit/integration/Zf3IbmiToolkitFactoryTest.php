<?php

declare(strict_types=1);

namespace Zf3IbmiToolkitIntegrationTest;

use Interop\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use ToolkitApi\Toolkit;
use Zend\Db\Adapter\Adapter;
use Zend\ServiceManager\ServiceManager;
use ZfIbmiToolkit\Factory\IbmiToolkitFactory;

final class Zf3IbmiToolkitFactoryTest extends TestCase
{
    public function testCanInstantiateToolkitWithDb2Resource()
    {
        if (!extension_loaded('ibm_db2')) {
            $this->markTestSkipped();
        }

        $serviceManager = new ServiceManager([
            'factories' => [
                'Config' => function (ContainerInterface $serviceManager) {
                    return Bootstrap::getDb2ToolkitConfig();
                },
                Adapter::class => function (ContainerInterface $serviceManager) {
                    return new Adapter(Bootstrap::getDb2AdapterConfig());
                },
            ]
        ]);

        $toolkit = (new IbmiToolkitFactory)->__invoke(
            $serviceManager,
            ''
        );
        $this->assertInstanceOf(Toolkit::class, $toolkit);
    }

    public function testCanInstantiateToolkitWithOdbcPdoResource()
    {
        if (!extension_loaded('odbc')) {
            $this->markTestSkipped();
        }
        $serviceManagerConfig = [
            'factories' => [
                'Config' => function (ContainerInterface $serviceManager) {
                    return Bootstrap::getPdoToolkitConfig();
                },
                Adapter::class => function (ContainerInterface $serviceManager) {
                    return new Adapter(Bootstrap::getOdbcPdoAdapterConfig());
                },
            ]
        ];

        $sm = new ServiceManager($serviceManagerConfig);

        $toolkit = (new IbmiToolkitFactory)->__invoke($sm, '');
        $this->assertInstanceOf(Toolkit::class, $toolkit);
        foreach ($sm->get('Config')['ibmi_toolkit']['system'] as $key => $value) {
            $this->assertEquals($value, $toolkit->getOption($key));
        }
    }
}