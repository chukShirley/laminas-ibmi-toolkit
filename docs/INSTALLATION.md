## Installation

* Install with Composer by running the following command from the project root:
```
$ composer require club-seiden/zf3-ibmi-toolkit
```

* Copy and rename configuration file
    * Move zf3_ibmi_toolkit.global.php.dist from /config to your project's config/autoload directory
    * Rename the file by removing ".dist"
 
* Add ZfIbmiToolkit to your list of modules
    * example:
    ```
    <?php
    // /config/application.config.php
    return [
        'modules' => [
            'MyModule1',
            'MyModule2',
            'ZfIbmiToolkit', // Add this line
        ],
    ];
    ```
