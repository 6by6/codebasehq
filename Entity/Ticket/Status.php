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
    public function getBackgroundColour()
    {
        return $this->backgroundColour;
    }

    /**
     * @param $backgroundColour
     * @return $this
     */
    public function setBackgroundColour($backgroundColour)
    {
        $this->backgroundColour = $backgroundColour;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param $order
     * @return $this
     */
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isTreatAsClosed()
    {
        return $this->treatAsClosed;
    }

    /**
     * @param $treatAsClosed
     * @return $this
     */
    public function setTreatAsClosed($treatAsClosed)
    {
        $this->treatAsClosed = $treatAsClosed;
        return $this;
    }

    protected static function getAllResourceName()
    {
        return '%project%/tickets/statuses';
    }
}