<?php

namespace SixBySix\CodebaseHq\Tests\Entity;

use PHPUnit\Framework\TestCase;
use SixBySix\CodebaseHq\Client as CodebaseHq;
use SixBySix\CodebaseHq\Entity\Project;
use SixBySix\CodebaseHq\Tests\AbstractTestCase;

class ProjectTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function mainTest()
    {
        $projects = Project::getAll();
        $this->assertContainsOnlyInstancesOf(Project::class, $projects);
    }

    public function countTest()
    {
        $projects = Project::getAll();
    }

    /**
     * @test
     */
    public function assignedUsers()
    {
        $project = Project::getAll()->limit(1)->get(0);
        $this->assertInstanceOf(Project::class, $project);
    }
}
