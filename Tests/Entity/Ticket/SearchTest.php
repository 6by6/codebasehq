<?php

namespace SixBySix\CodebaseHq\Tests\Entity\Ticket;

use PHPUnit\Framework\TestCase;
use SixBySix\CodebaseHq\Entity\Collection;
use SixBySix\CodebaseHq\Entity\Project;
use SixBySix\CodebaseHq\Entity\Ticket;

class SearchTest extends TestCase
{
    /**
     * @test
     */
    public function operatorsTest()
    {
        $q = new Ticket\Search();
        $q->priorityIs("high");
        $q->categoryNotIn(['edm', 'rap']);
        $q->statusIn([Ticket\Search::STATUS_OPEN, Ticket\Search::STATUS_CLOSED]);
        $q->assigneeIsNot(Ticket\Search::ASSIGNEE_ME);
        $q->sortBy(Ticket\Search::SORT_ASSIGNEE, Ticket\Search::SORT_ORDER_DESC);
        $this->assertEquals('priority:"high" not-category:"edm","rap" status:"open","closed" not-assignee:"me" sort:assignee desc', $q->getQueryString());
    }
}
