<?php
use ToolkitApi\Toolkit;
use ZfIbmiToolkit\IbmiToolkitFactory;

return [
    'service_manager' => [
        Toolkit::class => IbmiToolkitFactory::class
    ]
];
