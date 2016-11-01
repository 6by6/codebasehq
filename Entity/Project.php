<?php

namespace SixBySix\CodebaseHq\Entity;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;
use SixBySix\CodebaseHq\Client;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\GetOne;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

/**
 * Class Project
 * @package SixBySix\CodebaseHq\Entity
 */
class Project implements Entity
{
    use GetAll, GetOne, Serializable;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get", "update"})
     * @SerializedName("project-id")
     */
    protected $projectId;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "update", "post"})
     * @SerializedName("account-name")
     */
    protected $accountName;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get", "update", "post"})
     * @SerializedName("group-id")
     */
    protected $groupId;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get", "update", "post"})
     */
    protected $icon;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "update", "post"})
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "update", "post"})
     * @SerializedName("overview")
     */
    protected $overview;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "update", "post"})
     * @SerializedName("start-page")
     */
    protected $startPage;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "update", "post"})
     * @SerializedName("start-page")
     */
    protected $status;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "update", "post"})
     * @SerializedName("permalink")
     */
    protected $permalink;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get", "update", "post"})
     * @SerializedName("disk-usage")
     */
    protected $diskUsage;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get"})
     * @SerializedName("total-tickets")
     */
    protected $totalTickets;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get"})
     * @SerializedName("open-tickets")
     */
    protected $openTickets;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get"})
     * @SerializedName("closed-tickets")
     */
    protected $closedTickets;

    /**
     * @var Collection<ProjectUser>
     */
    protected $users;

    /**
     * @var Collection<Discussion>
     */
    protected $discussions;

    /**
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @return string
     */
    public function getAccountName()
    {
        return $this->accountName;
    }

    /**
     * @param string $accountName
     */
    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;
    }

    /**
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param int $groupId
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @return int
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param int $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getOverview()
    {
        return $this->overview;
    }

    /**
     * @param string $overview
     */
    public function setOverview($overview)
    {
        $this->overview = $overview;
    }

    /**
     * @return string
     */
    public function getStartPage()
    {
        return $this->startPage;
    }

    /**
     * @param string $startPage
     */
    public function setStartPage($startPage)
    {
        $this->startPage = $startPage;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * @param string $permalink
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;
    }

    /**
     * @return int
     */
    public function getDiskUsage()
    {
        return $this->diskUsage;
    }

    /**
     * @param int $diskUsage
     */
    public function setDiskUsage($diskUsage)
    {
        $this->diskUsage = $diskUsage;
    }

    /**
     * @return int
     */
    public function getTotalTickets()
    {
        return $this->totalTickets;
    }

    /**
     * @param int $totalTickets
     */
    public function setTotalTickets($totalTickets)
    {
        $this->totalTickets = $totalTickets;
    }

    /**
     * @return int
     */
    public function getOpenTickets()
    {
        return $this->openTickets;
    }

    /**
     * @param int $openTickets
     */
    public function setOpenTickets($openTickets)
    {
        $this->openTickets = $openTickets;
    }

    /**
     * @return int
     */
    public function getClosedTickets()
    {
        return $this->closedTickets;
    }

    /**
     * @param int $closedTickets
     */
    public function setClosedTickets($closedTickets)
    {
        $this->closedTickets = $closedTickets;
    }

    public function getUsers()
    {
        if ($this->users === null) {
            $this->users = ProjectUser::getAll([
                'project' => $this->getPermalink(),
            ]);
        }

        return $this->users;
    }

    public function getDiscussions()
    {
        if ($this->discussions === null) {
            $this->discussions = Discussion::getAll([
                'project' => $this->getPermalink(),
            ]);
        }

        return $this->users;
    }

    public function getRepositories()
    {
    }

    protected static function getOneNodeName()
    {
        return 'project';
    }

    protected static function getOneResourceName()
    {
        return 'project';
    }

    protected static function getAllResourceName()
    {
        return 'projects';
    }
}