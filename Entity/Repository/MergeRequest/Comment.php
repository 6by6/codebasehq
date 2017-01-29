<?php

namespace SixBySix\CodebaseHq\Entity;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\GetOne;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

/**
 * Class Hook
 * @package SixBySix\CodebaseHq\Entity\Repository\MergeRequest
 */
class Comment implements Entity
{
    use Serializable;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "post"})
     * @SerializedName("content")
     */
    protected $content;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get"})
     * @SerializedName("user-id")
     */
    protected $userId;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("action")
     */
    protected $action;

    /**
     * @var \DateTime
     * @Type("DateTime")
     * @Groups({"get"})
     * @SerializedName("created-at")
     */
    protected $createdAt;

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
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
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

}