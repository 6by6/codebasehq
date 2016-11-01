<?php

namespace SixBySix\CodebaseHq\Entity\Event;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use SixBySix\CodebaseHq\Entity\Event;

class SprintEnded extends Event
{
    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get"})
     * @SerializedName("remaining-tickets")
     */
    protected $remainingTickets;

    /**
     * @var float
     * @Type("float")
     * @Groups({"get"})
     * @SerializedName("velocity")
     */
    protected $velocity;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("project-permalink")
     */
    protected $projectPermalink;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("identifier")
     */
    protected $identifier;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("project-name")
     */
    protected $projectName;
}