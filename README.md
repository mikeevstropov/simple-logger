# mikeevstropov/simple-logger

Simple way to create instance of Monolog\Logger

## Installation

Add dependency [mikeevstropov/simple-logger](https://packagist.org/packages/mikeevstropov/simple-logger)

```bash
$ composer require mikeevstropov/simple-logger
```

## Usage

```php
<?php
  
use Mikeevstropov\SimpleLogger\LoggerFactory;

$logger = LoggerFactory::create(
    'path/to/file.log',
    'log-name',
    'DEBUG'
);

// add records to the log
$logger->warning('Warning message');
$logger->error('Error message');
// .. or other levels described by RFC 5424

```

## LoggerFactory Interface

- **create**
  
  _Returns instance of Monolog\Logger_
  
  Arguments:
  - `file` _(string)_ - path to the log file
  - `name` _(string)_ - name of logger or "logger" as default
  - `level` _(string)_ - log level or "DEBUG" as default
  
  Returns:
  - `Monolog\Logger`
  
## Log Levels

Monolog supports the logging levels described by [RFC 5424](http://tools.ietf.org/html/rfc5424).

- **DEBUG** (100): Detailed debug information.

- **INFO** (200): Interesting events. Examples: User logs in, SQL logs.

- **NOTICE** (250): Normal but significant events.

- **WARNING** (300): Exceptional occurrences that are not errors. Examples:
  Use of deprecated APIs, poor use of an API, undesirable things that are not
  necessarily wrong.

- **ERROR** (400): Runtime errors that do not require immediate action but
  should typically be logged and monitored.

- **CRITICAL** (500): Critical conditions. Example: Application component
  unavailable, unexpected exception.

- **ALERT** (550): Action must be taken immediately. Example: Entire website
  down, database unavailable, etc. This should trigger the SMS alerts and wake
  you up.

- **EMERGENCY** (600): Emergency: system is unusable.

## Development

Clone

```bash
$ git clone https://github.com/mikeevstropov/simple-logger.git
```

Go to project

```bash
$ cd simple-logger
```

Install dependencies

```bash
$ composer install
```

Run the tests

```bash
$ composer test
```