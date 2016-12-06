<?php

namespace SixBySix\CodebaseHq\Entity;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;
use SixBySix\CodebaseHq\Client;
use SixBySix\CodebaseHq\Entity\Traits\BelongsToProject;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\GetOne;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

/**
 * Class Ticket
 * @package SixBySix\CodebaseHq\Entity
 */
class Ticket implements Entity
{
    use BelongsToProject, GetAll, Serializable;

    /**
     * @var int
     * @Type("int")
     * @Groups({"get"})
     * @SerializedName("ticket-id")
     */
    protected $ticketId;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("summary")
     */
    protected $summary;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("ticket-type")
     */
    protected $type;

    /**
     * @var int
     * @Type("int")
     * @Groups({"get"})
     * @SerializedName("reporter-id")
     */
    protected $reporterId;

    /**
     * @var int
     * @Type("int")
     * @Groups({"get"})
     * @SerializedName("assignee-id")
     */
    protected $assigneeId;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("assignee-id")
     */
    protected $assigneeName;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("reporter")
     */
    protected $reporterName;

    /**
     * @var int
     * @Type("int")
     * @Groups({"get"})
     * @SerializedName("category-id")
     */
    protected $categoryId;

    /**
     * @var int
     * @Type("int")
     * @Groups({"get"})
     * @SerializedName("priority-id")
     */
    protected $priorityId;

    /**
     * @var int
     * @Type("int")
     * @Groups({"get"})
     * @SerializedName("status-id")
     */
    protected $statusId;

    /**
     * @var int
     * @Type("int")
     * @Groups({"get"})
     * @SerializedName("milestone-id")
     */
    protected $milestoneId;

    /**
     * @var string[]
     * @Type("Array<string>")
     * @Groups({"get"})
     * @SerializedName("upload-tokens")
     */
    protected $uploadTokens;

    /**
     * @return int
     */
    public function getTicketId(): int
    {
        return $this->ticketId;
    }

    /**
     * @param int $ticketId
     */
    public function setTicketId(int $ticketId)
    {
        $this->ticketId = $ticketId;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary(string $summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getReporterId(): int
    {
        return $this->reporterId;
    }

    /**
     * @param int $reporterId
     */
    public function setReporterId(int $reporterId)
    {
        $this->reporterId = $reporterId;
    }

    /**
     * @return int
     */
    public function getAssigneeId(): int
    {
        return $this->assigneeId;
    }

    /**
     * @param int $assigneeId
     */
    public function setAssigneeId(int $assigneeId)
    {
        $this->assigneeId = $assigneeId;
    }

    /**
     * @return string
     */
    public function getAssigneeName(): string
    {
        return $this->assigneeName;
    }

    /**
     * @param string $assigneeName
     */
    public function setAssigneeName(string $assigneeName)
    {
        $this->assigneeName = $assigneeName;
    }

    /**
     * @return string
     */
    public function getReporterName(): string
    {
        return $this->reporterName;
    }

    /**
     * @param string $reporterName
     */
    public function setReporterName(string $reporterName)
    {
        $this->reporterName = $reporterName;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     */
    public function setCategoryId(int $categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return int
     */
    public function getPriorityId(): int
    {
        return $this->priorityId;
    }

    /**
     * @param int $priorityId
     */
    public function setPriorityId(int $priorityId)
    {
        $this->priorityId = $priorityId;
    }

    /**
     * @return int
     */
    public function getStatusId(): int
    {
        return $this->statusId;
    }

    /**
     * @param int $statusId
     */
    public function setStatusId(int $statusId)
    {
        $this->statusId = $statusId;
    }

    /**
     * @return int
     */
    public function getMilestoneId(): int
    {
        return $this->milestoneId;
    }

    /**
     * @param int $milestoneId
     */
    public function setMilestoneId(int $milestoneId)
    {
        $this->milestoneId = $milestoneId;
    }

    /**
     * @return \string[]
     */
    public function getUploadTokens(): array
    {
        return $this->uploadTokens;
    }

    /**
     * @param \string[] $uploadTokens
     */
    public function setUploadTokens(array $uploadTokens)
    {
        $this->uploadTokens = $uploadTokens;
    }

    public function getTicketCategories()
    {

    }

    protected static function getAllResourceName()
    {
        return '%project%/tickets';
    }
}