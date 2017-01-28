<?php

namespace SixBySix\CodebaseHq\Entity\Ticket;

use SixBySix\CodebaseHq\Entity\Milestone;
use SixBySix\CodebaseHq\Entity\Ticket\Category;
use SixBySix\CodebaseHq\Entity\Ticket\Priority;
use SixBySix\CodebaseHq\Entity\Ticket\Type;
use SixBySix\CodebaseHq\Entity\User;
use SixBySix\CodebaseHq\Exception;


/**
 * Class Search
 * @package SixBySix\CodebaseHq\Entity\Ticket
 *
 *
 */
class Search
{
    protected $params;

    protected $sortBy;

    protected $sortDir;

    const SORT_NUMBER = 'number';
    const SORT_TYPE = 'type';
    const SORT_STATUS = 'status';
    const SORT_SUBJECT = 'subject';
    const SORT_RESOLUTION = 'resolution';
    const SORT_PRIORITY = 'priority';
    const SORT_CATEGORY = 'category';
    const SORT_ASSIGNEE = 'assignee';
    const SORT_MILESTONE = 'milestone';
    const SORT_CREATED_AT = 'created_at';
    const SORT_UPDATED_AT = 'updated_at';
    const SORT_DEADLINE = 'deadline';

    const PROPERTIES = [
        self::SORT_NUMBER,
        self::SORT_TYPE,
        self::SORT_STATUS,
        self::SORT_SUBJECT,
        self::SORT_RESOLUTION,
        self::SORT_PRIORITY,
        self::SORT_CATEGORY,
        self::SORT_ASSIGNEE,
        self::SORT_MILESTONE,
        self::SORT_CREATED_AT,
        self::SORT_UPDATED_AT,
        self::SORT_DEADLINE,
    ];

    const OPERATORS_IN = 'In';
    const OPERATORS_NOT_IN = 'NotIn';
    const OPERATORS_IS = 'Is';
    const OPERATORS_IS_NOT = 'IsNot';

    const OPERATORS = [
        self::OPERATORS_IN,
        self::OPERATORS_NOT_IN,
        self::OPERATORS_IS,
        self::OPERATORS_IS_NOT,
    ];

    const STATUS_OPEN = 'open';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CLOSED = 'closed';

    const ASSIGNEE_ME = 'me';
    const ASSIGNEE_NONE = 'none';
    const ASSIGNEE_ANY = 'any';

    const SORT_ORDER_ASC = 'asc';
    const SORT_ORDER_DESC = 'desc';

    public function __construct()
    {
        $this->params = [];
        $this->sortDir = self::SORT_ORDER_ASC;
    }

    public function __call($name, $args)
    {

        if (count($args) == 0) {
            throw new Exception("No filter value provided");
        }

        $value = $args[0];

        if (!preg_match('/([a-z_]+)([A-Z].*?)$/', $name, $m)) {
            throw new Exception("Invalid method: $name");
        }

        list($all, $property, $operator) = $m;

        if (!in_array($operator, self::OPERATORS)) {
            throw new Exception("Invalid filtering operator: $operator");
        }

        if (!in_array($property, self::PROPERTIES)) {
            throw new Exception("Invalid property: $property");
        }

        switch ($operator)
        {
            case self::OPERATORS_IS:
            case self::OPERATORS_IN:
                $this->params[$property] = $value;
                break;

            case self::OPERATORS_IS_NOT:
            case self::OPERATORS_NOT_IN:
                $this->params["not-$property"] = $value;
                break;
        }
    }

    public function sortBy($column, $dir = self::SORT_ORDER_ASC)
    {
        if (!in_array($column, self::PROPERTIES)) {
            throw new Exception("Invalid sort property: $column");
        }

        $this->sortBy = $column;
        $this->sortDir = $dir;
    }

    public function reset()
    {
        $this->params = [];
        $this->sortBy = null;
        $this->sortDir = self::SORT_ORDER_ASC;
    }

    public function __toString()
    {
        return $this->getQueryString();
    }

    public function getQueryString()
    {
        $params = [];

        foreach ($this->params as $property => $value) {
            if (is_array($value)) {
                foreach ($value as $idx => $v) {
                    $value[$idx] = json_encode("$v");
                }
                $params[] = "$property:" . implode(",", $value);

            } else {
                $params[] = "$property:" . json_encode("$value");
            }
        }

        if ($this->sortBy) {
            $params[] = "sort:{$this->sortBy} {$this->sortDir}";
        }

        return implode(" ", $params);
    }
}