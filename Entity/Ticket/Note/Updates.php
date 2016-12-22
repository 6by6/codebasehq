<?php

namespace SixBySix\CodebaseHq\Entity\Ticket\Note;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\PostDeserialize;
use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;
use SixBySix\CodebaseHq\Entity\Entity;
use SixBySix\CodebaseHq\Entity\Traits\BelongsToProject;
use SixBySix\CodebaseHq\Entity\Traits\GetAll;
use SixBySix\CodebaseHq\Entity\Traits\Serializable;


/**
 * Class Note
 * @package SixBySix\CodebaseHq\Entity\Ticket\Note
 */
class Updates implements Entity
{
    use Serializable;

    /**
     * @var array
     * @Annotation\Type("array")
     * @Groups({"get"})
     * @SerializedName("ticket_type_id")
     */
    protected $ticketTypeId;

    /**
     * @var array
     * @Annotation\Type("array")
     * @Groups({"get"})
     * @SerializedName("status_id")
     */
    protected $statusId;

    /**
     * @var array
     * @Annotation\Type("array")
     * @Groups({"get"})
     * @SerializedName("priority_id")
     */
    protected $priorityId;

    /**
     * @var array
     * @Annotation\Type("array")
     * @Groups({"get"})
     * @SerializedName("category_id")
     */
    protected $categoryId;

    /**
     * @var array
     * @Annotation\Type("array")
     * @Groups({"get"})
     * @SerializedName("tags")
     */
    protected $tags;

    public function hasUpdates()
    {
        return count($this->getChanges()) !== 0;
    }

    public function getOldTicketTypeId()
    {
        return $this->getOldData('ticketTypeId');
    }

    public function getNewTicketTypeId()
    {
        return $this->getNewData('ticketTypeId');
    }

    public function getOldStatusId()
    {
        return $this->getOldData('statusId');
    }

    public function getNewStatusId()
    {
        return $this->getNewData('statusId');
    }

    public function getOldPriorityId()
    {
        return $this->getOldData('priorityId');
    }

    public function getNewPriorityId()
    {
        return $this->getNewData('priorityId');
    }

    public function getOldCategoryId()
    {
        return $this->getOldData('categoryId');
    }

    public function getNewCategoryId()
    {
        return $this->getNewData('categoryId');
    }

    public function getOldTags()
    {
        return $this->getOldData('tags');
    }

    public function getNewTags()
    {
        return $this->getNewData('tags');
    }

    public function getChanges()
    {
        $changedProps = [];

        foreach (get_object_vars($this) as $prop => $value) {
            if ($prop == "origXml") {
                continue;
            }

            if ($value !== null) {
                $changedProps[$prop] = $value;
            }
        }

        return $changedProps;
    }

    protected function getNewData($prop)
    {
        if ($this->{$prop} !== null) {
            return $this->{$prop}[1];
        }
    }

    protected function getOldData($prop)
    {
        if ($this->{$prop} !== null) {
            return $this->{$prop}[0];
        }
    }


}