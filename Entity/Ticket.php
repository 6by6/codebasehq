<?php

namespace SixBySix\CodebaseHq\Entity;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\DeserializationContext;
use SixBySix\CodebaseHq\Client;
use SixBySix\CodebaseHq\Entity\Ticket\Note;
use SixBySix\CodebaseHq\Entity\Ticket\Watchers;
use SixBySix\CodebaseHq\Entity\Traits\BelongsToProject;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\GetOne;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

/**
 * Class Ticket
 * @package SixBySix\CodebaseHq\Entity
 */
class Ticket implements Entity, IsPaginated
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
     * @SerializedName("assignee")
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
     * @var int[]
     */
    protected $watchers;

    /**
     * @var Note[]
     */
    protected $notes;

    /**
     * @param int
     * @return $this
     */
    public function setId($id)
    {
        $this->ticketId = $id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->ticketId;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param $summary
     * @return $this
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getReporterId()
    {
        return $this->reporterId;
    }

    /**
     * @param $reporterId
     * @return $this
     */
    public function setReporterId($reporterId)
    {
        $this->reporterId = $reporterId;
        return $this;
    }

    /**
     * @return int
     */
    public function getAssigneeId()
    {
        return $this->assigneeId;
    }

    /**
     * @param $assigneeId
     * @return $this
     */
    public function setAssigneeId($assigneeId)
    {
        $this->assigneeId = $assigneeId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAssigneeName()
    {
        return $this->assigneeName;
    }

    /**
     * @param $assigneeName
     * @return $this
     */
    public function setAssigneeName($assigneeName)
    {
        $this->assigneeName = $assigneeName;
        return $this;
    }

    /**
     * @return string
     */
    public function getReporterName()
    {
        return $this->reporterName;
    }

    /**
     * @param $reporterName
     * @return $this
     */
    public function setReporterName($reporterName)
    {
        $this->reporterName = $reporterName;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param $categoryId
     * @return $this
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPriorityId()
    {
        return $this->priorityId;
    }

    /**
     * @param $priorityId
     * @return $this
     */
    public function setPriorityId($priorityId)
    {
        $this->priorityId = $priorityId;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * @param $statusId
     * @return $this
     */
    public function setStatusId($statusId)
    {
        $this->statusId = $statusId;
        return $this;
    }

    /**
     * @return int
     */
    public function getMilestoneId()
    {
        return $this->milestoneId;
    }

    /**
     * @param $milestoneId
     * @return $this
     */
    public function setMilestoneId($milestoneId)
    {
        $this->milestoneId = $milestoneId;
        return $this;
    }

    /**
     * @return \string[]
     */
    public function getUploadTokens()
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

    public function getNotes()
    {
        if ($this->notes === null) {
            $this->notes = Note::getAll([
                'project' => $this->getProjectPermalink(),
                'ticket' => $this->getId(),
            ]);
        }

        return $this->notes;
    }

    /**
     * @param $noteId
     * @return Note
     */
    public function getNote($noteId)
    {
        return Note::getOne($noteId, [
            'project' => $this->getProjectPermalink(),
            'ticket' => $this->getId(),
        ]);
    }

    public function addNote(Note $note)
    {
        $note->save([
            'ticket' => $this->getId(),
            'project' => $this->getProjectPermalink(),
        ]);
    }

    public function getWatchers()
    {
        if (!$this->watchers) {
            $xml = Client::get(
                sprintf('%s/tickets/%d/watchers', $this->getProjectPermalink(), $this->getId())
            );

            $this->watchers = [];

            foreach ($xml->watcher as $id) {
                $this->watchers[] = (int)$id;
            }
        }

        return $this->watchers;
    }

    /**
     * @param int|User
     * @return $this
     */
    public function addWatcher($user)
    {
        /** @var int[] $watchers */
        $watchers = $this->getWatchers();

        /** @var int $userId */
        $userId = ($user instanceof User) ? $user->getId() : (int) $user;

        $watchers[] = $userId;
        $this->watchers = array_unique($watchers);

        return $this;
    }

    public function removeWatcher($user)
    {
        /** @var int[] $watchers */
        $watchers = $this->getWatchers();

        /** @var int $userId */
        $userId = ($user instanceof User) ? $user->getId() : (int) $user;

        if (($idx = array_search($userId, $watchers)) !== false) {
            unset($watchers[$idx]);
        }

        $this->watchers = $watchers;

        return $this;
    }

    public function saveWatchers()
    {
        if (!is_array($this->watchers)) {
            return false;
        }

        /** @var Watchers $w */
        $w = new Watchers($this->watchers);

        /** @var string $xml */
        $xml = $this->getSerializer()->serialize($w, 'xml');

        Client::post(
            sprintf('%s/tickets/%d/watchers', $this->getProjectPermalink(), $this->getId()),
            $xml
        );
    }

    protected static function getAllResourceName()
    {
        return '%project%/tickets';
    }
}
