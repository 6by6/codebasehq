<?php

namespace SixBySix\CodebaseHq\Entity\Ticket\Note;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\PostDeserialize;
use JMS\Serializer\Annotation\XmlRoot;

use SixBySix\CodebaseHq\Entity\Entity;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;


/**
 * Class Note
 * @package SixBySix\CodebaseHq\Entity\Ticket\Note
 */
class PostChanges implements Entity
{
    use Serializable;

    /**
     * @var int
     * @Annotation\Type("int")
     * @Groups({"post"})
     * @SerializedName("milestone_id")
     */
    protected $milestoneId;

    /**
     * @var int
     * @Annotation\Type("int")
     * @Groups({"post"})
     * @SerializedName("assignee_id")
     */
    protected $assigneeId;

    /**
     * @var int
     * @Annotation\Type("int")
     * @Groups({"post"})
     * @SerializedName("category_id")
     */
    protected $categoryId;

    /**
     * @var int
     * @Annotation\Type("int")
     * @Groups({"post"})
     * @SerializedName("priority_id")
     */
    protected $priorityId;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Groups({"post"})
     * @SerializedName("summary")
     */
    protected $summary;

    /**
     * @return int
     */
    public function getMilestoneId()
    {
        return $this->milestoneId;
    }

    /**
     * @param int $milestoneId
     */
    public function setMilestoneId($milestoneId)
    {
        $this->milestoneId = $milestoneId;
    }

    /**
     * @return int
     */
    public function getAssigneeId()
    {
        return $this->assigneeId;
    }

    /**
     * @param int $assigneeId
     */
    public function setAssigneeId($assigneeId)
    {
        $this->assigneeId = $assigneeId;
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return int
     */
    public function getPriorityId()
    {
        return $this->priorityId;
    }

    /**
     * @param int $priorityId
     */
    public function setPriorityId($priorityId)
    {
        $this->priorityId = $priorityId;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }
}