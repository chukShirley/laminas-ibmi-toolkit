## Usage

The Toolkit class is made available as a service under the name 
'ToolkitApi\Toolkit'. Thus in order to use the toolkit within a class
you'll need to use a factory to inject it as a dependency like so:
```
<?php
namespace MyNamespace\Factory;

use Interop\Container\ContainerInterface;
use MyNamespace\MyClassController;
use Zend\ServiceManager\Factory\FactoryInterface;

class MyClassFactory implements FactoryInterface 
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new MyClass(
            $container->get(Toolkit::class) // Equivalent of $container->get('\ToolkitApi\Toolkit');
        );
    }
}
```
