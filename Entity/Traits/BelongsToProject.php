<?php

namespace SixBySix\CodebaseHq\Entity\Traits;

use SixBySix\CodebaseHq\Entity\Project;

/**
 * Class BelongsToProject
 * @package SixBySix\CodebaseHq\Entity\Traits
 */
trait BelongsToProject
{
    protected $projectPermalink;

    /**
     * @return mixed
     */
    public function getProjectPermalink()
    {
        return $this->projectPermalink;
    }

    /**
     * @param mixed $projectPermalink
     */
    public function setProjectPermalink($projectPermalink)
    {
        $this->projectPermalink = $projectPermalink;
    }
}
