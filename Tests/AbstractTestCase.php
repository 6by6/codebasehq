<?php

namespace SixBySix\CodebaseHq\Tests;

use PHPUnit\Framework\TestCase;
use SixBySix\CodebaseHq\Client as CodebaseHq;

abstract class AbstractTestCase extends TestCase
{
    public static function setUpBeforeClass()
    {
        CodebaseHq::init(
            $accountName = $_ENV['API_ACCOUNT'],
            $username = $_ENV['API_USER'],
            $password = $_ENV['API_KEY']
        );
    }
}
