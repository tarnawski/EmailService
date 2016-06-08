<?php

namespace spec\AppBundle\EventListener;

use AppBundle\Entity\Email;
use AppBundle\Services\KafkaService;
use Doctrine\ORM\Event\LifecycleEventArgs;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EmailListenerSpec extends ObjectBehavior
{
    function let(KafkaService $kafkaService)
    {
        $this->beConstructedWith($kafkaService);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('AppBundle\EventListener\EmailListener');
    }

    function it_should_do_nothing_if_if_not_email_entity(LifecycleEventArgs $args)
    {
        $args->getEntity()->willReturn(null);

        $this->postPersist($args)->shouldReturn(null);
    }
}
