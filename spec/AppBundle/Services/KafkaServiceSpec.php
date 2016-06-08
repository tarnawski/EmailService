<?php

namespace spec\AppBundle\Services;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class KafkaServiceSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(true, 'arg2', 'arg1', 'arg1');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('AppBundle\Services\KafkaService');
    }

    function it_should_not_send_if_enable_is_false()
    {
        $this->beConstructedWith(false, 'arg2', 'arg1', 'arg1');
        $this->sendMessage()->shouldReturn(null);
    }
}
