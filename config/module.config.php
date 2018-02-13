<?php
use ToolkitApi\Toolkit;
use ZfIbmiToolkit\Factory\IbmiToolkitFactory;

return [
    'service_manager' => [
        Toolkit::class => IbmiToolkitFactory::class
    ]
];
