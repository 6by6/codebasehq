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
 * Class Project
 * @package SixBySix\CodebaseHq\Entity
 */
class Repository implements Entity
{
    use BelongsToProject, GetAll, GetOne, Serializable {
        GetAll::formatUrl insteadof GetOne;
    }

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "post"})
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("permalink")
     */
    protected $permalink;

    /**
     * @var int
     * @Type("integer")
     * @Groups({"get"})
     * @SerializedName("disk-usage")
     */
    protected $diskUsage;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("last-commit-ref")
     */
    protected $lastCommitRef;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("clone-url")
     */
    protected $cloneUrl;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("source")
     */
    protected $source;

    /**
     * @var boolean
     * @Type("boolean")
     * @Groups({"get"})
     * @SerializedName("sync")
     */
    protected $sync;

    /**
     * @var boolean
     * @Type("boolean")
     * @Groups({"get"})
     * @SerializedName("sync")
     */
    protected $lastSyncAt;

    /**
     * @var string
     * @Type("string")
     * @Groups({"post"})
     * @SerializedName("scm")
     */
    protected $scm;

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
     * @return string
     */
    public function getLastCommitRef()
    {
        return $this->lastCommitRef;
    }

    /**
     * @param string $lastCommitRef
     */
    public function setLastCommitRef($lastCommitRef)
    {
        $this->lastCommitRef = $lastCommitRef;
    }

    /**
     * @return string
     */
    public function getCloneUrl()
    {
        return $this->cloneUrl;
    }

    /**
     * @param string $cloneUrl
     */
    public function setCloneUrl($cloneUrl)
    {
        $this->cloneUrl = $cloneUrl;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return bool
     */
    public function isSync()
    {
        return $this->sync;
    }

    /**
     * @param bool $sync
     */
    public function setSync($sync)
    {
        $this->sync = $sync;
    }

    /**
     * @return bool
     */
    public function isLastSyncAt()
    {
        return $this->lastSyncAt;
    }

    /**
     * @param bool $lastSyncAt
     */
    public function setLastSyncAt($lastSyncAt)
    {
        $this->lastSyncAt = $lastSyncAt;
    }

    /**
     * @return string
     */
    public function getScm()
    {
        return $this->scm;
    }

    /**
     * @param string $scm
     */
    public function setScm($scm)
    {
        $this->scm = $scm;
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