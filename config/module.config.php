<?php
use ToolkitApi\Toolkit;
use ZfIbmiToolkit\Factory\IbmiToolkitFactory;

return [
    'service_manager' => [
        'factories' => [
            Toolkit::class => IbmiToolkitFactory::class,
        ],
    ],
];
