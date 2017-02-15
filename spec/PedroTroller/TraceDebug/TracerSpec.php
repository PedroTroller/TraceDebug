<?php

namespace spec\PedroTroller\TraceDebug;

use Exception;
use PedroTroller\TraceDebug\TraceHandler;
use PedroTroller\TraceDebug\Tracer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TracerSpec extends ObjectBehavior
{
    function let(TraceHandler $handler1, TraceHandler $handler2)
    {
        $this->addHandler($handler1);
        $this->addHandler($handler2);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Tracer::class);
    }

//   function it_dispatchs_trace_to_handlers($handler1, $handler2, $exception)
//   {
//       $handler1->onTrace(Argument::type('array'), null)->shouldBeCalled();
//       $handler2->onTrace(Argument::type('array'), null)->shouldBeCalled();

//       $exception = new Exception;

//       Tracer::trace(null, 2, $exception);
//   }

//   function it_dispatchs_trace_to_handlers_when_i_use_trace_function($handler1, $handler2, $exception)
//   {
//       $handler1->onTrace(Argument::type('array'), null)->shouldBeCalled();
//       $handler2->onTrace(Argument::type('array'), null)->shouldBeCalled();

//       trace();
//   }

    function it_dispatchs_trace_to_handlers_with_identifier($handler1, $handler2, $exception)
    {
        $handler1->onTrace(Argument::type('array'), 'identity')->shouldBeCalled();
        $handler2->onTrace(Argument::type('array'), 'identity')->shouldBeCalled();

        Tracer::trace('identity');
    }

    function it_dispatchs_trace_to_handlers_when_i_use_trace_function_with_identity($handler1, $handler2, $exception)
    {
        $handler1->onTrace(Argument::type('array'), 'identity')->shouldBeCalled();
        $handler2->onTrace(Argument::type('array'), 'identity')->shouldBeCalled();

        trace('identity');
    }
}
