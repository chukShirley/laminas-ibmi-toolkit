<?php
use ToolkitApi\Toolkit;
use LaminasIbmiToolkit\Factory\IbmiToolkitFactory;

return [
    'service_manager' => [
        'factories' => [
            Toolkit::class => IbmiToolkitFactory::class,
        ],
    ],
];
