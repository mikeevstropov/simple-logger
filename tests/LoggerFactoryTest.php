<?php

namespace Mikeevstropov\SimpleLogger;

use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class LoggerFactoryTest extends TestCase
{
    protected $file = 'var/file.log';

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->removeLogFile();
    }

    public function removeLogFile()
    {
        if (file_exists($this->file)) {

            if (!unlink($this->file))
                throw new \Exception(sprintf(
                    'Unable to remove existed log file "%s".',
                    $this->file
                ));
        }
    }

    public function testCanWrite()
    {
        $logger = LoggerFactory::create(
            $this->file
        );

        $this->assertInstanceOf(
            Logger::class,
            $logger
        );

        $logger->debug('Test message');

        $this->assertFileExists(
            $this->file
        );
    }

    public function testCanSetLevel()
    {
        $this->removeLogFile();

        $logger = LoggerFactory::create(
            $this->file,
            'logger',
            'ERROR'
        );

        $logger->debug(
            'Debug message'
        );

        $this->assertFileNotExists(
            $this->file
        );

        $logger->error(
            'Error message'
        );

        $this->assertFileExists(
            $this->file
        );
    }

    public function testCanSetName()
    {
        $this->removeLogFile();

        $name = 'mySpecialNameThatWillMatched';

        $logger = LoggerFactory::create(
            $this->file,
            $name
        );

        $logger->debug('Message');

        $this->assertFileExists(
            $this->file
        );

        $contents = file_get_contents(
            $this->file
        );

        $this->assertInternalType(
            'string',
            $contents
        );

        $this->assertContains(
            $name,
            $contents
        );
    }
}