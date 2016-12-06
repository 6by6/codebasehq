<?php

namespace SixBySix\CodebaseHq\Entity\Event;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use SixBySix\CodebaseHq\Entity\Event;

class TicketingTicket extends Event
{
    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get"})
     * @SerializedName("number")
     */
    protected $number;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("subject")
     */
    protected $subject;

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
     * @SerializedName("project-name")
     */
    protected $projectName;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("assignee")
     */
    protected $assignee;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("priority")
     */
    protected $priority;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("source")
     */
    protected $source;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("source-ref")
     */
    protected $sourceRef;
}