# Laminas IBM i Toolkit
This is a Laminas MVC Module wrapper for the IBM i Toolkit. 

* [Installation](/docs/INSTALLATION.md)
* [Usage](/docs/USAGE.md)

## Current features
Currently, this module assumes you're using the toolkit's DB2 transport. 
As such it looks for a service with the name provided in laminas_ibmi_toolkit.global.php,
expecting that service to be an instance of Laminas\Db\Adapter. In the future
we will allow for other transports supported by the toolkit (ssh, local, http, and https).
