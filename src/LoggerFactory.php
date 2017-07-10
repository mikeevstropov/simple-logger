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
     * @param string $level Log level
     * @param string $name  Name of logger
     *
     * @return Logger
     */
    static public function create(
        $file,
        $level = 'DEBUG',
        $name = 'logger'
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