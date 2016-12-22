<?php

namespace SixBySix\CodebaseHq\Tests\Entity;

use SixBySix\CodebaseHq\Entity\Collection;
use SixBySix\CodebaseHq\Entity\Project;
use SixBySix\CodebaseHq\Entity\Ticket;
use SixBySix\CodebaseHq\Entity\Ticket\Note;
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

    /**
     * @test
     */
    public function notesTest()
    {
        /** @var Project $project */
        $project = $this->getProject();

        /** @var Ticket $ticket */
        $ticket = $project->getTickets()->get(0);

        /** @var Collection<Note> $notes */
        $notes = $ticket->getNotes();

        $this->assertInstanceOf(Collection::class, $notes);
        $this->assertContainsOnlyInstancesOf(Note::class, $notes);

        foreach ($notes as $note) {
            if ($note->hasUpdates()) {

                $changes = $note->getUpdates()->getChanges();

                foreach ($changes as $prop => $value) {

                    $getter = ucwords($prop);

                    $old = $note->getUpdates()->{"getOld$getter"}();
                    $new = $note->getUpdates()->{"getNew$getter"}();

                    $this->assertEquals($value[0], $old);
                    $this->assertEquals($value[1], $new);
                }

            } else {
                $this->assertContainsOnly('null', [
                    $note->getUpdates()->getOldTicketTypeId(),
                    $note->getUpdates()->getNewTicketTypeId(),
                    $note->getUpdates()->getOldStatusId(),
                    $note->getUpdates()->getNewStatusId(),
                    $note->getUpdates()->getOldPriorityId(),
                    $note->getUpdates()->getNewPriorityId(),
                    $note->getUpdates()->getOldCategoryId(),
                    $note->getUpdates()->getNewCategoryId(),
                    $note->getUpdates()->getOldTags(),
                    $note->getUpdates()->getNewTags(),
                ]);
            }
        }

        // get a random note and load directly

        /** @var Note $randomNote */
        $randomNote = $notes->get(rand(0, sizeof($notes)));

        /** @var Note $note */
        $note = $ticket->getNote($randomNote->getId());

        $this->assertEquals($randomNote->getId(), $note->getId());
    }

    /**
     * @test
     */
    public function postNoteTest()
    {
        /** @var Project $project */
        $project = $this->getProject();

        /** @var Ticket $ticket */
        $ticket = $project->getTickets()->get(0);

        /** @var int $time */
        $time = time();

        /** @var Note $note */
        $note = new Note();
        $note->setContent($time);
        $note->setTimeAdded(15);
        $ticket->addNote($note);

        /** @var Note $newNote */
        $newNote = $ticket->getNote($note->getId());

        $this->assertEquals($newNote->getContent(), $note->getContent());
    }

    /**
     * @test
     */
    public function watchersTest()
    {
        /** @var Project $project */
        $project = $this->getProject();

        /** @var Ticket $ticket */
        $ticket = $project->getTickets()->get(0);

        /** @var int[] $watchers */
        $watchers = $ticket->getWatchers();

        $this->assertInternalType('array', $watchers);

        /** @var int $w */
        foreach ($watchers as $w) {
            $ticket->removeWatcher($w);
        }

        $ticket->saveWatchers();
    }
}
