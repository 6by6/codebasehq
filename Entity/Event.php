<?php

namespace SixBySix\CodebaseHq\Entity;

use JMS\Serializer\Annotation\Discriminator;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

/**
 * @Discriminator(field = "type", map = {
 *     "comment": "SixBySix\CodebaseHq\Entity\Event\Comment",
 *     "commit": "SixBySix\CodebaseHq\Entity\Event\Commit",
 *     "deployment": "SixBySix\CodebaseHq\Entity\Event\Deployment",
 *     "merge_request_close": "SixBySix\CodebaseHq\Entity\Event\MergeRequestClose",
 *     "merge_request_comment": "SixBySix\CodebaseHq\Entity\Event\MergeRequestComment",
 *     "merge_request_creation": "SixBySix\CodebaseHq\Entity\Event\MergeRequestCreation",
 *     "merge_request_open": "SixBySix\CodebaseHq\Entity\Event\MergeRequestOpen",
 *     "named_tree": "SixBySix\CodebaseHq\Entity\Event\NamedTree",
 *     "project": "SixBySix\CodebaseHq\Entity\Event\Project",
 *     "push": "SixBySix\CodebaseHq\Entity\Event\Push",
 *     "ticketing_milestone": "SixBySix\CodebaseHq\Entity\Event\TicketingMilestone",
 *     "ticketing_note": "SixBySix\CodebaseHq\Entity\Event\TicketingNote",
 *     "ticketing_ticket": "SixBySix\CodebaseHq\Entity\Event\TicketingTicket",
 *     "wiki_page": "SixBySix\CodebaseHq\Entity\Event\WikiPage",
 *     "sprint_creation": "SixBySix\CodebaseHq\Entity\Event\SprintCreation",
 *     "sprint_ended": "SixBySix\CodebaseHq\Entity\Event\SprintEnded"
 * })
 */
class Event implements Entity, IsPaginated
{
    use GetAll, Serializable;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("title")
     */
    protected $title;

    /**
     * @var \DateTime
     * @Type("DateTime<'Y-m-d H:i:s e'>")
     * @Groups({"get"})
     * @SerializedName("timestamp")
     */
    protected $timestamp;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("html-title")
     */
    protected $htmlTitle;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("html-text")
     */
    protected $htmlText;

    /**
     * @var int
     * @Type("integer")
     * @Groups({"get"})
     * @SerializedName("user-id")
     */
    protected $userId;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("actor-email")
     */
    protected $actorEmail;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("actor-name")
     */
    protected $actorName;

    /**
     * @var int
     * @Type("integer")
     * @Groups({"get"})
     * @SerializedName("project-id")
     */
    protected $projectId;

    /**
     * @var bool
     * @Type("boolean")
     * @Groups({"get"})
     * @SerializedName("deleted")
     */
    protected $deleted;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("avatar-url")
     */
    protected $avatarUrl;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param \DateTime $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return string
     */
    public function getHtmlTitle()
    {
        return $this->htmlTitle;
    }

    /**
     * @param string $htmlTitle
     */
    public function setHtmlTitle($htmlTitle)
    {
        $this->htmlTitle = $htmlTitle;
    }

    /**
     * @return string
     */
    public function getHtmlText()
    {
        return $this->htmlText;
    }

    /**
     * @param string $htmlText
     */
    public function setHtmlText($htmlText)
    {
        $this->htmlText = $htmlText;
    }

    protected static function getAllResourceName()
    {
        return 'activity';
    }
}
