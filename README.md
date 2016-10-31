# ZF3 IBM i Toolkit
This is a Zend Framework 3 Module wrapper for the IBM i Toolkit. 

* [Installation](/docs/INSTALLATION.md)
* [Usage](/docs/USAGE.md)

## Current features
Currently this module assumes you're using the toolkit's DB2 transport. 
As such it looks for a service with the name provided in zf3_ibmi_toolkit.global.php,
expecting that service to be an instance of Zend\Db\Adapter. In the future
we will allow for http and https transports.
