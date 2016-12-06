<?php

namespace SixBySix\CodebaseHq\Tests\Entity;

use PHPUnit\Framework\TestCase;
use SixBySix\CodebaseHq\Client as CodebaseHq;
use SixBySix\CodebaseHq\Entity\Collection;
use SixBySix\CodebaseHq\Entity\Project;
use SixBySix\CodebaseHq\Entity\ProjectUser;
use SixBySix\CodebaseHq\Tests\AbstractTestCase;

class ProjectTest extends AbstractTestCase
{
    /**
     * @_test
     */
    public function mainTest()
    {
        $projects = Project::getAll();
        $this->assertContainsOnlyInstancesOf(Project::class, $projects);
    }

    /**
     * @test
     */
    public function getOneTest()
    {
        $project = $this->getProject();
        $this->assertInstanceOf(Project::class, $project);
    }

    /**
     * @test
     */
    public function assignedUsers()
    {
        /** @var Project $project */
        $project = $this->getProject();

        /** @var Collection<ProjectUser> $users */
        $users = $project->getUsers();

        $this->assertInstanceOf(Collection::class, $users);
        $this->assertContainsOnlyInstancesOf(ProjectUser::class, $users);
    }
}
