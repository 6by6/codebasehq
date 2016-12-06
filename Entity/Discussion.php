<?php

namespace SixBySix\CodebaseHq\Entity;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;
use SixBySix\CodebaseHq\Entity\Discussion\Post;
use SixBySix\CodebaseHq\Entity\Traits\BelongsToProject;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

class Discussion implements Entity
{
    use GetAll, Serializable, BelongsToProject;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get", "update"})
     * @SerializedName("id")
     */
    protected $id;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "update", "post"})
     * @SerializedName("subject")
     */
    protected $subject;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "update", "post"})
     * @SerializedName("permalink")
     */
    protected $permalink;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("last-post-at")
     */
    protected $lastPostAt;

    /**
     * @var integer
     * @Type("integer")
     * @Groups("get")
     * @SerializedName("user-id")
     */
    protected $userId;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get", "post"})
     * @SerializedName("category-id")
     */
    protected $categoryId;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     */
    protected $category;

    /**
     * @var string
     */
    protected $projectPermalink;

    protected $posts;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Discussion
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return Discussion
     */
    public function setSubject(string $subject)
    {
        $this->subject = $subject;
        return $this;
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
     * @return Discussion
     */
    public function setPermalink(string $permalink)
    {
        $this->permalink = $permalink;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastPostAt()
    {

        if (!is_null($this->lastPostAt)) {
            return new \DateTime($this->lastPostAt);
        }

        return $this->lastPostAt;
    }

    /**
     * @param string $lastPostAt
     * @return Discussion
     */
    public function setLastPostAt(string $lastPostAt)
    {
        $this->lastPostAt = $lastPostAt;
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
     * @param int $userId
     * @return Discussion
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
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
     * @param int $categoryId
     * @return Discussion
     */
    public function setCategoryId(int $categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return Discussion
     */
    public function setCategory(string $category)
    {
        $this->category = $category;
        return $this;
    }

    public function getPosts()
    {
        if (!$this->posts) {
            $this->posts = Post::getAll([
                'project' => $this->getProjectPermalink(),
                'discussion' => $this->getPermalink(),
            ]);
        }

        return $this->posts;
    }

    public static function getAllResourceName()
    {
        return '%project%/discussions';
    }
}