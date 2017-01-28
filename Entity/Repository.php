<?php

namespace SixBySix\CodebaseHq\Entity;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;
use SixBySix\CodebaseHq\Client;
use SixBySix\CodebaseHq\Entity\Traits\BelongsToProject;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\GetOne;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

/**
 * Class Project
 * @package SixBySix\CodebaseHq\Entity
 */
class Repository implements Entity
{
    use BelongsToProject, GetAll, GetOne, Serializable {
        GetAll::formatUrl insteadof GetOne;
    }

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "update", "post"})
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "update", "post"})
     * @SerializedName("permalink")
     */
    protected $permalink;

    protected static function getOneNodeName()
    {
        return 'project';
    }

    protected static function getOneResourceName()
    {
        return 'project';
    }

    protected static function getAllResourceName()
    {
        return 'projects';
    }
}