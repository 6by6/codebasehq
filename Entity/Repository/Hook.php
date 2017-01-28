<?php

namespace SixBySix\CodebaseHq\Entity;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

/**
 * Class Hook
 * @package SixBySix\CodebaseHq\Entity\Repository
 */
class Hook implements Entity
{
    use GetAll, Serializable;

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
     * @Groups({"get", "post"})
     * @SerializedName("url")
     */
    protected $url;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "post"})
     * @SerializedName("username")
     */
    protected $username;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "post"})
     * @SerializedName("password")
     */
    protected $password;

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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Hook
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Hook
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Hook
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    protected static function getAllResourceName()
    {
        return '%project%/%repository%/hooks';
    }
}