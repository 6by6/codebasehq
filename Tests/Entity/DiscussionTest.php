<?php

namespace SixBySix\CodebaseHq\Tests\Entity;

use SixBySix\CodebaseHq\Entity\Collection;
use SixBySix\CodebaseHq\Entity\Discussion;
use SixBySix\CodebaseHq\Entity\Project;
use SixBySix\CodebaseHq\Tests\AbstractTestCase;

class DiscussionTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function gettersTest()
    {
        $discussions = Discussion::getAll([
            'project' => $_ENV['PROJECT_PERMALINK'],
        ]);

        $directDiscussionCount = $discussions->count();

        /** @var Project $project */
        $project = Project::getOne($_ENV['PROJECT_PERMALINK']);

        /** @var Collection<Discussion> $discussions */
        $discussions = $project->getDiscussions();

        $this->assertEquals($directDiscussionCount, $discussions->count());
    }
}
