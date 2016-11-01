<?php

namespace SixBySix\CodebaseHq\Entity\Discussion;

use SixBySix\CodebaseHq\Entity\Entity;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

class Post implements Entity
{
    use GetAll, Serializable;

    public static function getAllResourceName()
    {
        return '%project%/%discussions/posts';
    }
}