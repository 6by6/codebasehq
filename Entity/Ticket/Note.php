<?php

namespace SixBySix\CodebaseHq\Entity\Ticket;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\PostDeserialize;
use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\XmlSerializationVisitor;
use SixBySix\CodebaseHq\Entity\Entity;
use SixBySix\CodebaseHq\Entity\Ticket\Note\PostChanges;
use SixBySix\CodebaseHq\Entity\Ticket\Note\Updates;
use SixBySix\CodebaseHq\Entity\Traits\BelongsToProject;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\GetOne;
use SixBySix\CodebaseHq\Entity\Traits\CanSave;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;


/**
 * Class Note
 * @package SixBySix\CodebaseHq\Entity\Ticket
 * @XmlRoot("ticket-note")
 */
class Note implements Entity
{
    use GetAll, GetOne, Serializable, BelongsToProject, CanSave {
        GetAll::formatUrl insteadof GetOne;
    }

    /**
     * @var string
     * @Annotation\Type("int")
     * @Groups({"get"})
     * @SerializedName("id")
     */
    protected $id;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Groups({"get", "post"})
     * @SerializedName("content")
     */
    protected $content;

    /**
     * @var int
     * @Annotation\Type("integer")
     * @Groups({"get", "post"})
     * @SerializedName("time-added")
     */
    protected $timeAdded;

    /**
     * @var \DateTime
     * @Annotation\Type("DateTime")
     * @Groups({"get"})
     * @SerializedName("created-at")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @Annotation\Type("DateTime")
     * @Groups({"get"})
     * @SerializedName("updated-at")
     */
    protected $updatedAt;

    /**
     * @var int
     * @Annotation\Type("int")
     * @Groups({"get"})
     * @SerializedName("user-id")
     */
    protected $userId;

    /**
     * @var Updates
     * @Annotation\Type("string")
     * @Groups({"get"})
     * @SerializedName("updates")
     */
    protected $updatesJson;

    /**
     * @var Updates
     */
    protected $updates;

    /**
     * @var PostChanges
     * @Annotation\Type("SixBySix\CodebaseHq\Entity\Ticket\Note\PostChanges")
     * @Groups({"post"})
     * @SerializedName("changes")
     */
    protected $changes;

    public function __construct()
    {
        $this->changes = new PostChanges();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Note
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Note
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimeAdded()
    {
        return $this->timeAdded;
    }

    /**
     * @param int $timeAdded
     * @return Note
     */
    public function setTimeAdded($timeAdded)
    {
        $this->timeAdded = $timeAdded;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Note
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return Note
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return Note
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return Updates
     */
    public function getUpdates()
    {
        return $this->updates;
    }

    /**
     * @param Updates $updates
     * @return Note
     */
    public function setUpdates($updates)
    {
        $this->updates = $updates;
        return $this;
    }

    /**
     * @PostDeserialize
     */
    public function deserializeUpdates()
    {
        $this->updates = self::deserialize(
            $this->updatesJson,
            Updates::class,
            'json'
        );
    }

    /**
     * @return int
     */
    public function getMilestoneId()
    {
        return $this->changes->getMilestoneId();
    }

    /**
     * @param int $milestoneId
     * @return Note
     */
    public function setMilestoneId($milestoneId)
    {
        $this->changes->setMilestoneId($milestoneId);
        return $this;
    }

    /**
     * @return int
     */
    public function getAssigneeId()
    {
        return $this->changes->getAssigneeId();
    }

    /**
     * @param int $assigneeId
     * @return Note
     */
    public function setAssigneeId($assigneeId)
    {
        $this->changes->setAssigneeId($assigneeId);
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->changes->getCategoryId();
    }

    /**
     * @param int $categoryId
     * @return Note
     */
    public function setCategoryId($categoryId)
    {
        $this->changes->setCategoryId($categoryId);
        return $this;
    }

    /**
     * @return int
     */
    public function getPriorityId()
    {
        return $this->changes->getPriorityId();
    }

    /**
     * @param int $priorityId
     * @return Note
     */
    public function setPriorityId($priorityId)
    {
        $this->changes->setPriorityId($priorityId);
        return $this;
    }

    /**
     * @return int
     */
    public function getStatusId()
    {
        return $this->changes->getStatusId();
    }

    /**
     * @param int $statusId
     * @return Note
     */
    public function setStatusId($statusId)
    {
        $this->changes->setStatusId($statusId);
        return $this;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->changes->getSummary();
    }

    /**
     * @param string $summary
     * @return Note
     */
    public function setSummary($summary)
    {
        $this->changes->setSummary($summary);
        return $this;
    }

    public function hasUpdates()
    {
        return $this->updates->hasUpdates();
    }

    protected static function getOneResourceName()
    {
        return '%project%/tickets/%ticket%/notes/%id%';
    }

    protected static function getAllResourceName()
    {
        return '%project%/tickets/%ticket%/notes';
    }

    protected static function getPostResourceName()
    {
        return '%project%/tickets/%ticket%/notes';
    }

    protected static function getPutResourceName()
    {
        return '%project%/tickets/%ticket%/notes';
    }

    protected static function getOneNodeName()
    {
        return 'ticket-note';
    }

}