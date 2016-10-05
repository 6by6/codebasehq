<?php

namespace SixBySix\CodebaseHq\Tests;

use PHPUnit\Framework\TestCase;
use SixBySix\CodebaseHq\Client as CodebaseHq;
use SixBySix\CodebaseHq\Entity\ProjectGroup;

class ScratchTest extends TestCase
{
    /**
     * @test
     */
    public function mainTest()
    {
        CodebaseHq::init(
            $accountName = $_ENV['API_ACCOUNT'],
            $username = $_ENV['API_USER'],
            $password = $_ENV['API_KEY']
        );

        $projectGroups = ProjectGroup::getAll();

        var_dump($projectGroups);

    }
}
