# ChangeLog

Changes between version.

## v0.4

### v0.4.1

* [Config] minor code improvements
* [Router] fix *redirect* causing an error if input was not a valid URL

### v0.4.0

* add slaxer CLI tool
* slaxer component installation commands
* magic getter/setter traits
* multiple loggers, for system, slaxer, and the user application with possibility to define more
* composer autoloader exposed as autoloader.service to the Application object
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
