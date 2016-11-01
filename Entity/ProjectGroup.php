<?php

namespace SixBySix\CodebaseHq\Entity;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlRoot;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

/**
 * Class ProjectGroup
 * @package SixBySix\CodebaseHq\Entity
 * @XmlRoot("project-group")
 */
class ProjectGroup implements Entity
{
    use GetAll, Serializable;

    /**
     * @var int
     * @Type("integer")
     * @Groups({"get", "update"})
     */
    protected $id;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "update", "post"})
     */
    protected $label;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    protected static function getAllResourceName()
    {
        return 'project_groups';
    }
}
