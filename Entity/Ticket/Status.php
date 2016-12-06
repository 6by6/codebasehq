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

class Status implements Entity
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
     * @SerializedName("background-colour")
     */
    protected $backgroundColour;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get"})
     * @SerializedName("order")
     */
    protected $order;

    /**
     * @var bool
     * @Type("boolean")
     * @Groups({"get"})
     * @SerializedName("treat-as-closed")
     */
    protected $treatAsClosed;

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
    public function getBackgroundColour(): string
    {
        return $this->backgroundColour;
    }

    /**
     * @param string $backgroundColour
     */
    public function setBackgroundColour(string $backgroundColour)
    {
        $this->backgroundColour = $backgroundColour;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder(int $order)
    {
        $this->order = $order;
    }

    /**
     * @return boolean
     */
    public function isTreatAsClosed(): bool
    {
        return $this->treatAsClosed;
    }

    /**
     * @param boolean $treatAsClosed
     */
    public function setTreatAsClosed(bool $treatAsClosed)
    {
        $this->treatAsClosed = $treatAsClosed;
    }

    protected static function getAllResourceName()
    {
        return '%project%/tickets/statuses';
    }
}