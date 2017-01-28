<?php

namespace SixBySix\CodebaseHq\Entity;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

/**
 * Class Commit
 * @package SixBySix\CodebaseHq\Entity\Repository
 */
class Deployment implements Entity
{
    use GetAll, Serializable;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get","post"})
     * @SerializedName("branch")
     */
    protected $branch;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get","post"})
     * @SerializedName("revision")
     */
    protected $revision;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get","post"})
     * @SerializedName("environment")
     */
    protected $environment;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get","post"})
     * @SerializedName("servers")
     */
    protected $servers;

    /**
     * @return string
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * @param string $branch
     */
    public function setBranch($branch)
    {
        $this->branch = $branch;
    }

    /**
     * @return string
     */
    public function getRevision()
    {
        return $this->revision;
    }

    /**
     * @param string $revision
     */
    public function setRevision($revision)
    {
        $this->revision = $revision;
    }

    /**
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param string $environment
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
    }

    /**
     * @return string
     */
    public function getServers()
    {
        return $this->servers;
    }

    /**
     * @param string $servers
     */
    public function setServers($servers)
    {
        $this->servers = $servers;
    }

    protected static function getAllResourceName()
    {
        return '%project%/%repository%/deployments';
    }
}