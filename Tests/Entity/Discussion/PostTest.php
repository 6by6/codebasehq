<?php

namespace SixBySix\CodebaseHq\Tests\Entity\Discussion;

use SixBySix\CodebaseHq\Entity\Discussion;
use SixBySix\CodebaseHq\Entity\Discussion\Post;
use SixBySix\CodebaseHq\Entity\Project;
use SixBySix\CodebaseHq\Tests\AbstractTestCase;

class PostTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function mainTest()
    {
        /** @var Project $project */
        $project = $this->getProject();

        /** @var Discussion $discussion */
        $discussion = $project->getDiscussions()->get(0);

        $posts = $discussion->getPosts();

        $this->assertContainsOnlyInstancesOf(Post::class, $posts);
    }
}
