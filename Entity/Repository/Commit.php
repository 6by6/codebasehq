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
class Commit implements Entity
{
    use GetAll, Serializable;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("ref")
     */
    protected $ref;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("message")
     */
    protected $message;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("author-name")
     */
    protected $authorName;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("author-email")
     */
    protected $authorEmail;

    /**
     * @var \DateTime
     * @Type("DateTime")
     * @Groups({"get"})
     * @SerializedName("authored-at")
     */
    protected $authoredAt;

    /**
     * @var \DateTime
     * @Type("DateTime")
     * @Groups({"get"})
     * @SerializedName("committed-at")
     */
    protected $committedAt;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("committer-name")
     */
    protected $committerName;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("committer-email")
     */
    protected $committerEmail;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("parent-ref")
     */
    protected $parentRef;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("tree-ref")
     */
    protected $treeRef;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("author-user")
     */
    protected $authorUser;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("committer-name")
     */
    protected $committerUser;

    /**
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param string $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @param string $authorName
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }

    /**
     * @return string
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    /**
     * @param string $authorEmail
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;
    }

    /**
     * @return \DateTime
     */
    public function getAuthoredAt()
    {
        return $this->authoredAt;
    }

    /**
     * @param \DateTime $authoredAt
     */
    public function setAuthoredAt($authoredAt)
    {
        $this->authoredAt = $authoredAt;
    }

    /**
     * @return \DateTime
     */
    public function getCommittedAt()
    {
        return $this->committedAt;
    }

    /**
     * @param \DateTime $committedAt
     */
    public function setCommittedAt($committedAt)
    {
        $this->committedAt = $committedAt;
    }

    /**
     * @return string
     */
    public function getCommitterName()
    {
        return $this->committerName;
    }

    /**
     * @param string $committerName
     */
    public function setCommitterName($committerName)
    {
        $this->committerName = $committerName;
    }

    /**
     * @return string
     */
    public function getCommitterEmail()
    {
        return $this->committerEmail;
    }

    /**
     * @param string $committerEmail
     */
    public function setCommitterEmail($committerEmail)
    {
        $this->committerEmail = $committerEmail;
    }

    /**
     * @return string
     */
    public function getParentRef()
    {
        return $this->parentRef;
    }

    /**
     * @param string $parentRef
     */
    public function setParentRef($parentRef)
    {
        $this->parentRef = $parentRef;
    }

    /**
     * @return string
     */
    public function getTreeRef()
    {
        return $this->treeRef;
    }

    /**
     * @param string $treeRef
     */
    public function setTreeRef($treeRef)
    {
        $this->treeRef = $treeRef;
    }

    /**
     * @return string
     */
    public function getAuthorUser()
    {
        return $this->authorUser;
    }

    /**
     * @param string $authorUser
     */
    public function setAuthorUser($authorUser)
    {
        $this->authorUser = $authorUser;
    }

    /**
     * @return string
     */
    public function getCommitterUser()
    {
        return $this->committerUser;
    }

    /**
     * @param string $committerUser
     */
    public function setCommitterUser($committerUser)
    {
        $this->committerUser = $committerUser;
    }

    protected static function getAllResourceName()
    {
        return '%project%/%repository%/commits/%ref%';
    }
}