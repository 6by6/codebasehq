<?php

namespace SixBySix\CodebaseHq\Entity;

use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

class Discussion implements Entity
{
    use GetAll, Serializable;

    public static function getAllResourceName()
    {
        return '%project%/discussions';
    }
}