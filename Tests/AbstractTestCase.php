<?php

namespace SixBySix\CodebaseHq\Tests;

use PHPUnit\Framework\TestCase;
use SixBySix\CodebaseHq\Client as CodebaseHq;
use SixBySix\CodebaseHq\Entity\Project;

abstract class AbstractTestCase extends TestCase
{
    protected $project;

    public static function setUpBeforeClass()
    {
        CodebaseHq::init(
            $accountName = $_ENV['API_ACCOUNT'],
            $username = $_ENV['API_USER'],
            $password = $_ENV['API_KEY']
        );
    }

    protected function getProject()
    {
        if (!$this->project) {
            $this->project = Project::getOne($_ENV['PROJECT_PERMALINK']);
        }

        return $this->project;
    }
}
