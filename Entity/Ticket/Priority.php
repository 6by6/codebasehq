<?php

namespace SixBySix\CodebaseHq\Entity\Ticket;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;
use SixBySix\CodebaseHq\Entity\Entity;
use SixBySix\CodebaseHq\Entity\Traits\BelongsToProject;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

class Priority implements Entity
{
    use GetAll, Serializable, BelongsToProject;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get"})
     * @SerializedName("id")
     */
    protected $id;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("colour")
     */
    protected $colour;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get"})
     * @SerializedName("position")
     */
    protected $position;

    /**
     * @var bool
     * @Type("boolean")
     * @Groups({"get"})
     * @SerializedName("default")
     */
    protected $default;

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
    public function getColour()
    {
        return $this->colour;
    }

    /**
     * @param $colour
     * @return $this
     */
    public function setColour($colour)
    {
        $this->colour = $colour;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param $position
     * @return $this
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDefault()
    {
        return $this->default;
    }

    /**
     * @param $default
     * @return $this
     */
    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }

    protected static function getAllResourceName()
    {
        return '%project%/tickets/priorities';
    }
}