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
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getColour(): string
    {
        return $this->colour;
    }

    /**
     * @param string $colour
     */
    public function setColour(string $colour)
    {
        $this->colour = $colour;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition(int $position)
    {
        $this->position = $position;
    }

    /**
     * @return boolean
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @param boolean $default
     */
    public function setDefault(bool $default)
    {
        $this->default = $default;
    }

    protected static function getAllResourceName()
    {
        return '%project%/tickets/priorities';
    }
}