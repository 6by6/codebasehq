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
 * @package SixBySix\CodebaseHq\Entity\Repository
 */
class MergeRequest implements Entity
{
    use GetAll, GetOne, Serializable;

    const STATUS_NEW = 'new';
    const STATUS_MERGE = 'merge';
    const STATUS_DONE = 'done';
    const STATUS_FAILED = 'failed';

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
     * @Groups({"get","post"})
     * @SerializedName("source-ref")
     */
    protected $sourceRef;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get","post"})
     * @SerializedName("target-ref")
     */
    protected $targetRef;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get","post"})
     * @SerializedName("subject")
     */
    protected $subject;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("status")
     */
    protected $status;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get"})
     * @SerializedName("user-id")
     */
    protected $userId;

    /**
     * @var boolean
     * @Type("boolean")
     * @Groups({"get"})
     * @SerializedName("can-merge")
     */
    protected $canMerge;

    /**
     * @var Comment[]
     * @Type("array<SixBySix\CodebaseHq\Entity\Repository\MergeRequest\Comment>")
     * @Groups({"get"})
     * @SerializedName("comments")
     */
    protected $comments;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSourceRef()
    {
        return $this->sourceRef;
    }

    /**
     * @return string
     */
    public function getTargetRef()
    {
        return $this->targetRef;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return bool
     */
    public function canMerge()
    {
        return $this->canMerge;
    }

    /**
     * @return Comment[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param string $sourceRef
     * @return MergeRequest
     */
    public function setSourceRef($sourceRef)
    {
        $this->sourceRef = $sourceRef;
        return $this;
    }

    /**
     * @param string $targetRef
     * @return MergeRequest
     */
    public function setTargetRef($targetRef)
    {
        $this->targetRef = $targetRef;
        return $this;
    }

    /**
     * @param string $subject
     * @return MergeRequest
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    protected static function getOneNodeName()
    {
        return 'merge-request';
    }

    protected static function getAllResourceName()
    {
        return '%project%/%repository%/merge_requests';
    }

    protected static function getOneResourceName()
    {
        return '%project%/%repository%/merge_requests/%merge_request_id%';
    }
}