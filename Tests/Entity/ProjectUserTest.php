<?php

namespace SixBySix\CodebaseHq\Tests\Entity;

use SixBySix\CodebaseHq\Entity\Collection;
use SixBySix\CodebaseHq\Entity\Project;
use SixBySix\CodebaseHq\Entity\ProjectUser;
use SixBySix\CodebaseHq\Tests\AbstractTestCase;

class ProjectUserTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function mainTest()
    {
        /** @var Project $project */
        $project = Project::getAll()->get(0);

        /** @var Collection $users */
        $users = $project->getUsers();

        /** @var Collection $rawUsers $rawUsers */
        $rawUsers = ProjectUser::getAll($project->getPermalink());

        $this->assertContainsOnlyInstancesOf(ProjectUser::class, $users);
    }
}
