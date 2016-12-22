<?php

namespace SixBySix\CodebaseHq\Entity;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;
use SixBySix\CodebaseHq\Entity\Entity;
use SixBySix\CodebaseHq\Entity\Traits\BelongsToProject;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

/**
 * Class Milestone
 * @package SixBySix\CodebaseHq\Entity
 */
class Milestone implements Entity
{
    use GetAll, Serializable, BelongsToProject;
    
    const STATUS_ACTIVE = 'active';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

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
     * @Type("DateTime<'Y-m-d'>")
     * @Groups({"get"})
     * @SerializedName("start-at")
     */
    protected $startAt;

    /**
     * @var string
     * @Type("DateTime<'Y-m-d'>")
     * @Groups({"get"})
     * @SerializedName("deadline")
     */
    protected $deadline;

    /**
     * @var int
     * @Type("int")
     * @Groups({"get"})
     * @SerializedName("parent-id")
     */
    protected $parentId;

    /**
     * @var int
     * @Type("int")
     * @Groups({"get"})
     * @SerializedName("estimatedTime")
     */
    protected $estimatedTime;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("status")
     */
    protected $status;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Milestone
     */
    public function setId(int $id): Milestone
    {
        $this->id = $id;
        return $this;
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
     * @return Milestone
     */
    public function setName(string $name): Milestone
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getStartAt(): string
    {
        return $this->startAt;
    }

    /**
     * @param string $startAt
     * @return Milestone
     */
    public function setStartAt(string $startAt): Milestone
    {
        $this->startAt = $startAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeadline(): string
    {
        return $this->deadline;
    }

    /**
     * @param string $deadline
     * @return Milestone
     */
    public function setDeadline(string $deadline): Milestone
    {
        $this->deadline = $deadline;
        return $this;
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parentId;
    }

    /**
     * @param int $parentId
     * @return Milestone
     */
    public function setParentId(int $parentId): Milestone
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @return int
     */
    public function getEstimatedTime(): int
    {
        return $this->estimatedTime;
    }

    /**
     * @param int $estimatedTime
     * @return Milestone
     */
    public function setEstimatedTime(int $estimatedTime): Milestone
    {
        $this->estimatedTime = $estimatedTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Milestone
     */
    public function setStatus(string $status): Milestone
    {
        $this->status = $status;
        return $this;
    }

    public function isCompleted()
    {
        return $this->getStatus() == self::STATUS_COMPLETED;
    }

    public function isActive()
    {
        return $this->getStatus() == self::STATUS_ACTIVE;
    }

    public function isCancelled()
    {
        return $this->getStatus() == self::STATUS_CANCELLED;
    }

    protected static function getAllResourceName()
    {
        return '%project%/tickets/categories';
    }
}