<?php

namespace SixBySix\CodebaseHq\Entity;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlRoot;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\GetOne;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;

class User implements Entity
{
    use GetAll, GetOne, Serializable;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get"})
     * @SerializedName("id")
     */
    protected $id;

    /**
     * @var integer
     * @Type("integer")
     * @Groups({"get", "update", "post"})
     * @SerializedName("company")
     */
    protected $company;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("first-name")
     */
    protected $firstName;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("last-name")
     */
    protected $lastName;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("username")
     */
    protected $username;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("email-address")
     */
    protected $emailAddress;

    /**
     * @var string[]
     * @Type("array<string>")
     * @Groups({"get"})
     * @SerializedName("email-addresses")
     * @XmlList(entry="email-address")
     */
    protected $emailAddresses;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get", "update", "post"})
     * @SerializedName("time-zone")
     */
    protected $timeZone;

    /**
     * @var string
     * @Type("string")
     * @Groups({"get"})
     * @SerializedName("api-key")
     */
    protected $apiKey;

    /**
     * @var Project[]
     * @Type("array<SixBySix\CodebaseHq\Entity\Project>")
     * @Groups({"get"})
     * @SerializedName("assignments")
     * @XmlList(entry="assignment")
     */
    protected $assignments;

    /**
     * @var bool
     * @Type("boolean")
     * @Groups({"get"})
     * @SerializedName("enabled")
     */
    protected $enabled;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param int $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
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
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return \string[]
     */
    public function getEmailAddresses()
    {
        return $this->emailAddresses;
    }

    /**
     * @param \string[] $emailAddresses
     */
    public function setEmailAddresses($emailAddresses)
    {
        $this->emailAddresses = $emailAddresses;
    }

    /**
     * @return string
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * @param string $timeZone
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return Project[]
     */
    public function getAssignments()
    {
        return $this->assignments;
    }

    /**
     * @param Project[] $assignments
     */
    public function setAssignments($assignments)
    {
        $this->assignments = $assignments;
    }

    protected static function getAllResourceName()
    {
        return 'users';
    }

    protected static function getOneResourceName()
    {
        return 'user';
    }

    protected static function getOneNodeName()
    {
        return 'user';
    }
}