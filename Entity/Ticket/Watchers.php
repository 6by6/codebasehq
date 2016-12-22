<?php

namespace SixBySix\CodebaseHq\Entity\Ticket;

use JMS\Serializer\Annotation;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Inline;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlList;

use SixBySix\CodebaseHq\Entity\Entity;
use SixBySix\CodebaseHq\Entity\Traits\CanSave;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\GetOne;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;
use SixBySix\CodebaseHq\Entity\User;


/**
 * Class Watchers
 * @package SixBySix\CodebaseHq\Entity\Ticket
 * @XmlRoot("watchers")
 */
class Watchers implements Entity
{
    /** @XmlAttribute */
    private $type = "array";

    /**
     * @Annotation\Type("array<int>")
     * @Inline
     * @Groups({"post"})
     * @XmlList(inline = true, entry = "watcher")
     */
    protected $peopleIds;

    public function __construct(array $peopleIds)
    {
        $this->peopleIds = $peopleIds;
    }
}