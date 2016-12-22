<?php

namespace SixBySix\CodebaseHq\Entity\Ticket;

use JMS\Serializer\Annotation;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;
use SixBySix\CodebaseHq\Entity\Entity;
use SixBySix\CodebaseHq\Entity\Traits\BelongsToProject;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

class Type implements Entity
{
    use GetAll, Serializable, BelongsToProject;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Groups({"get"})
     * @SerializedName("id")
     */
    protected $id;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Groups({"get"})
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Groups({"get"})
     * @SerializedName("icon")
     */
    protected $icon;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param $icon
     * @return $this
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    protected static function getAllResourceName()
    {
        return '%project%/tickets/types';
    }
}