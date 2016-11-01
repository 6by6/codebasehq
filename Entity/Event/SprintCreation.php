<?php

namespace SixBySix\CodebaseHq\Entity\Event;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use SixBySix\CodebaseHq\Entity\Event;

class SprintCreation extends Event
{
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
     * @SerializedName("start-date")
     */
    protected $startDate;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("end-date")
     */
    protected $endDate;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get"})
     * @SerializedName("ticket-count")
     */
    protected $ticketCount;

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
}