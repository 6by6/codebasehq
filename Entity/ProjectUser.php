<?php

namespace SixBySix\CodebaseHq\Entity;

use SixBySix\CodebaseHq\Entity\Traits\BelongsToProject;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\GetOne;

class ProjectUser extends User
{
    use BelongsToProject;
}