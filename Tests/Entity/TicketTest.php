<?php

namespace SixBySix\CodebaseHq\Tests\Entity;

use SixBySix\CodebaseHq\Entity\Collection;
use SixBySix\CodebaseHq\Entity\Project;
use SixBySix\CodebaseHq\Entity\Ticket;
use SixBySix\CodebaseHq\Tests\AbstractTestCase;

class TicketTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function mainTest()
    {
        /** @var Project $project */
        $project = $this->getProject();

        /** @var Collection<Ticket> $tickets */
        $tickets = $project->getTickets();

        $this->assertContainsOnlyInstancesOf(Ticket::class, $tickets);
    }

    /**
     * @test
     */
    public function categoryTest()
    {
        /** @var Project $project */
        $project = $this->getProject();

        /** @var Collection<Category> $categories */
        $categories = $project->getTicketCategories();

        $this->assertContainsOnlyInstancesOf(Ticket\Category::class, $categories);
    }

    /**
     * @test
     */
    public function priorityTest()
    {
        /** @var Project $project */
        $project = $this->getProject();

        /** @var Collection<Priority> $priorities */
        $priorities = $project->getTicketPriorities();

        $this->assertContainsOnlyInstancesOf(Ticket\Priority::class, $priorities);
    }

    /**
     * @test
     */
    public function statusTest()
    {
        /** @var Project $project */
        $project = $this->getProject();

        /** @var Collection<Status> $statuses */
        $statuses = $project->getTicketStatuses();

        $this->assertContainsOnlyInstancesOf(Ticket\Status::class, $statuses);
    }

    /**
     * @test
     */
    public function typeTest()
    {
        /** @var Project $project */
        $project = $this->getProject();

        /** @var Collection<Type> $priorities */
        $types = $project->getTicketTypes();

        $this->assertContainsOnlyInstancesOf(Ticket\Type::class, $types);
    }
}
