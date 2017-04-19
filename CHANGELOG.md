# ChangeLog

Changes between version.

## Current changes

* [Bootstrap] add service provider for config component
* [Bootstrap] add service provider for hooks component
* [Bootstrap] add service provider for logger component
* [Bootstrap] add service provider for router component
* [Bootstrap] add exception for invalid config handler
* [Bootstrap] add exception for unknown logger handler
* [Bootstrap] add exception for logger config
* [Bootstrap] move route collection provider from router component
* [Bootstrap] add possibility to define route and route collection specific before and/or after dispatch hooks
* [Bootstrap] set 404 status code on route not found exception
* [Bootstrap] re-throw the route not found exception to allow the output component to handle it
* [Bootstrap] resources like hooks, routes, and providers are now loaded from a single method to help improve
performance
* [Bootstrap] add component command
* [Bootstrap] download and install composer if not found in PATH
* [Cache] add file cache handler
* [Cache] add basic cache handling
* [Cache-Database] simple query caching and retrieval based on the where statement and column list
* [Config] remove service provider
* [Config] remove unneeded exception
* [Config] add JSON configuration handler
* [Database] add connection timeout configuration option
* [Database] add query builder to the main database component
* [Database] base model callbacks are now handled through the hooks system
* [Database-PDO] set connection timeout when instantiating PDO
* [Database-PDO] remove query builder from the pdo sub-component
* [Framework] register moved service providers
* [Framework] disable the output component in slaxer CLI tool bootstrap
* [Hooks] remove service provider
* [Logger] remove service provider
* [Logger] remove factory
* [Logger] remove unneeded exception classes
* [Output] add additional error data to the JSON output handler
* [Output] pass error to the error handler if it implements error handling
* [Output] set error code before checking application environment in error handler
* [Output] use the response set error code if one was set before
* [Output] add a set enabled method to the manager to enable disabling/enabling at runtime
* [Router] remove service provider
* [Router] remove factory
* [Session] update config component dependency
* [Slaxer] removed component command
* [View] load templates without a view class
* [View] load sub templates without a view class
* [View] load multiple sub views/sub templates with the same name

## v0.5

### v0.5.0

* [Bootstrap] often needed parameters set as application properties
* [Bootstrap] controller loader
* [Database] keep result object in model for simple access
* [Database] soft delete functionality in database
* [Database] model joining
* [Database] SQL functions can now be used in update and insert statements as well as WHERE predicates
* [Framework] cache services initialized with 'protect' in providers
* [Framework] providers/Hooks/Routes/Commands definitions moved from *app.php* to *provider.php* config file
* [Hooks] log messages to system logger
* [Hooks] user definable hook execution parameters
* [Hooks] provide a *hooks* array for hook definitions in the definition provider
* [Logger] prepend log file name with the logFilePath configuration option if the file name is a relative path
* [Output] output component error output handling
* [Output] output component view handler
* [Output] output component json handler
* [Output] output component output buffering and output restriction
* [Router] optional trailing slash matching in router
* [Router] segment baser URI matching

## v0.4

### v0.4.1

* [Config] minor code improvements
* [Router] fix *redirect* causing an error if input was not a valid URL

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
