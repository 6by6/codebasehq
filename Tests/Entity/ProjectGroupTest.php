<?php

namespace SixBySix\CodebaseHq\Tests\Entity;

use PHPUnit\Framework\TestCase;
use SixBySix\CodebaseHq\Client as CodebaseHq;
use SixBySix\CodebaseHq\Entity\ProjectGroup;
use SixBySix\CodebaseHq\Tests\AbstractTestCase;

class ProjectGroupTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function mainTest()
    {
        $groups = ProjectGroup::getAll();
        $this->assertContainsOnlyInstancesOf(ProjectGroup::class, $groups);
    }
}
