<?php

namespace Mikeevstropov\SimpleLogger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LoggerFactory
{
    /**
     * Create instance of Monolog\Logger
     *
     * @param string $file  Path to log file
     * @param string $name  Name of logger
     * @param string $level Log level
     *
     * @return Logger
     */
    static public function create(
        $file,
        $name = 'logger',
        $level = 'DEBUG'
    ) {

        $logger = new Logger($name);

        $streamHandler = new StreamHandler(
            $file,
            $level
        );

        $logger->pushHandler(
            $streamHandler
        );

        return $logger;
    }
}