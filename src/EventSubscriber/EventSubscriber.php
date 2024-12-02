<?php

namespace App\EventSubscriber;

use CalendarBundle\Entity\Event;
use CalendarBundle\Event\SetDataEvent;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EventSubscriber
{
    #[AsEventListener()]
    public function onDataEvent(SetDataEvent $setDataEvent): void
    {
        $start = $setDataEvent->getStart();
        $end = $setDataEvent->getEnd();
        $filters = $setDataEvent->getFilters();

        // You may want to make a custom query from your database to fill the calendar

        $setDataEvent->addEvent(new Event(
            'workout',
            new \DateTime('today 7AM'),
            new \DateTime('today 8AM'),
        ));

        $setDataEvent->addEvent(new Event(
            'breakfast with mom',
            new \DateTime('tomorrow 10AM'),
            new \DateTime('tomorrow 11AM'),
        ));

        // If the end date is null or not defined, it creates a all day event
        $setDataEvent->addEvent(new Event(
            'Friday fast',
            new \DateTime('Friday this week')
        ));


        // ...
    }

}
