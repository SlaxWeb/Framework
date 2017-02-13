# ChangeLog

Changes between version.

## Current version

* [Bootstrap] often needed parameters set as application properties
* [Bootstrap] controller loader
* [Database] keep result object in model for simple access
* [Database] soft delete functionality in database
* [Database] model joining
* [Database] SQL functions can now be used in update and insert statements as well as WHERE predicates
* [Framework] cache services initialized with 'protect' in providers
* [Framework] providers/Hooks/Routes/Commands definitions moved from *app.php* to *provider.php* config file
* [Logger] prepend log file name with the logFilePath configuration option if the file name is a relative path
* [Output] output component error output handling
* [Output] output component view handler
* [Output] output component json handler
* [Output] output component output buffering and output restriction
* [Router] optional trailing slash matching in router
* [Router] segment baser URI matching

## v0.4

### v0.4.0

* add slaxer CLI tool
* slaxer component installation commands
* magic getter/setter traits
* multiple loggers, for system, slaxer, and the user application with possibility to define more
* composer autoloader exposed as *autoloader.service* to the Application object
* experimental high performance server - AppServer component
* application environment control and error display restrictions based on that environment
* view component
* PHP template loader
* twig template loader
* multi URI routing
* multi method routing
* default HTTP Method in routes set to HTTP GET
* database component
* query builder
* PDO database sub-component
* base model
* session component

## v0.3

### v0.3.1

* remove resource name prepended keys from configuration files, since bootstrap
prepends them now

### v0.3.0

* initial version
