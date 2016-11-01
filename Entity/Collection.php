<?php

namespace SixBySix\CodebaseHq\Entity;

use SixBySix\CodebaseHq\Client;

class Collection implements \Iterator
{
    /** @var Entity[] */
    protected $items;

    /** @var  int */
    protected $position;

    /** @var  string */
    protected $resource;

    /** @var  string */
    protected $entityClass;

    /** @var  boolean */
    protected $isEmpty;

    /** @var  integer */
    protected $page;

    /** @var  integer */
    protected $limit;

    /** @var  bool */
    protected $hasFetchedAll;

    /** @var mixed[] */
    protected $baseRequestOpts;

    public function __construct($resource, $entityClass, array $baseRequestOpts = [])
    {
        $this->items = [];
        $this->position = 0;
        $this->resource = $resource;
        $this->entityClass = $entityClass;
        $this->isEmpty = false;
        $this->page = 1;
        $this->limit = null;
        $this->hasFetchedAll = false;
        $this->baseRequestOpts = $baseRequestOpts;

        // load first page results
        $this->getNextPage();
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->items[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    /**
     * @return int
     */
    public function count()
    {
        if ($this->isEmpty) {
            return 0;
        }

        while (true) {
            if (!$this->getNextPage()) {
                break;
            }
        }

        return sizeof($this->items);
    }

    public function valid()
    {
        if (isset($this->items[$this->position])) {
            return true;
        }

        return $this->getNextPage();
    }

    public function next()
    {
        ++$this->position;
    }

    public function setPage($page)
    {
        $this->page = $page;
    }

    public function limit($limit)
    {
        $this->limit = (int) $limit;
        return $this;
    }

    public function get($index)
    {
        if (isset($this->items[$index])) {
            return $this->items[$index];
        }

        // @todo deal with out-of-range indices
    }

    protected function add(Entity $item)
    {
        $this->items[] = $item;
    }

    protected function getNextPage()
    {
        if ($this->isEmpty || $this->hasFetchedAll) {
            return false;
        }

        /** @var int $remainingItems */
        $remainingItems = (($this->limit !== null) && ($this->limit > 0))
            ? ($this->limit - $this->count())
            : null;

        if ($remainingItems === 0) {
            return false;
        }

        /** @var mixed[] $opts */
        $opts = $this->getRequestParams();

        /** @var \SimpleXMLElement $xml */
        $xml = Client::get($this->resource, $opts);

        if ($xml->children()->count() === 0) {
            $this->hasFetchedAll = true;
            return false;
        }

        foreach ($xml->children() as $entityXml) {

            /** @var string $class */
            $class = $this->entityClass;

            $entity = $class::deserialize($entityXml->asXml());
            $this->add($entity);

            if ($remainingItems !== null) {
                --$remainingItems;

                if ($remainingItems == 0) {
                    break;
                }
            }
        }

        if (count($this->items) == 0) {
            $this->isEmpty = true;
            return false;
        }

        if ($remainingItems && ($remainingItems == 0)) {
            $this->hasFetchedAll = true;
        }

        if ($this->isPaginated()) {
            ++$this->page;
        } else {
            $this->hasFetchedAll = true;
        }

        return true;
    }

    protected function getRequestParams()
    {
        $opts = [];

        if ($this->isPaginated()) {
            $opts['page'] = $this->page;
        }

        return $opts;
    }

    protected function isPaginated()
    {
        return is_subclass_of($this->entityClass, IsPaginated::class);
    }
}