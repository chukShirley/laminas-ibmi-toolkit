<?php

declare(strict_types=1);

namespace LaminasIbmiToolkitIntegrationTest;

use Laminas\Db\Adapter\Adapter;

final class Bootstrap
{
    /**
     * @return string
     */
    private static function getUser(): string
    {
        $config = require __DIR__ . '/config/integrationTestConfig.php';
        return $config['db']['username'];
    }

    /**
     * @return string
     */
    private static function getPassword(): string
    {
        $config = require __DIR__ . '/config/integrationTestConfig.php';
        return $config['db']['password'];
    }


    /**
     * @return array
     */
    public static function getDb2AdapterConfig(): array
    {
        return [
            'driver' => 'IbmDb2',
            'database' => '*LOCAL',
            'platform' => 'IbmDb2',
            'username' => self::getUser(),
            'password' => self::getPassword(),
        ];
    }

    public static function getOdbcPdoAdapterConfig(): array
    {
        return [
            'dsn' => "odbc:DSN=*LOCAL;",
            'driver' => 'Pdo',
            'platform' => 'IbmDb2',
            'username' => self::getUser(),
            'password' => self::getPassword(),
        ];
    }

    /**
     * @return array
     */
    public static function getDb2ToolkitConfig(): array
    {
        return [
            'ibmi_toolkit' => [
                'system' => [
                    'transportType' => 'db2',
                ],
                'databaseAdapterService' => Adapter::class,
            ],
        ];
    }

    /**
     * @return array
     */
    public static function getPdoToolkitConfig(): array
    {
        return [
            'ibmi_toolkit' => [
                'system' => [
                    'transportType' => 'pdo',
                    'XMLServiceLib' => 'QXMLSERV',
                    'HelperLib' => 'QXMLSERV',
                    'debug' => false,
                    'trace' => false,
                    'sbmjobParams' => 'QSYS/QSRVJOB/XTOOLKIT',
                    'stateless' => true,
                ],
                'databaseAdapterService' => 'Laminas\Db\Adapter\Adapter',
            ],
        ];
    }
}