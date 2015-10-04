<?php

namespace PedroTroller\TraceDebug\DataCollector;

use PedroTroller\TraceDebug\TraceHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

class TraceCollector extends DataCollector implements TraceHandler
{
    public function __construct()
    {
        $this->data['identified'] = [];
        $this->data['anonymous']  = [];
    }

    /**
     * @return array
     */
    public function getTraces()
    {
        return $this->data;
    }

    /**
     * {@inheritdoc}
     */
    public function onTrace(array $trace, $identifier = null)
    {
        foreach ($trace as $index => $call) {
            foreach ($call['args'] as $position => $arg) {
                $call['args'][$position] = $this->varToString($arg);
            }
            $trace[$index] = $call;
        }

        $side = null === $identifier ? 'anonymous' : 'identified';

        if (null === $identifier) {
            $this->data[$side][] = $trace;
        } else {
            if (false === array_key_exists($identifier, $this->data[$side])) {
                $this->data[$side][$identifier] = [];
            }
            $this->data[$side][$identifier][] = $trace;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'trace_debug';
    }
}
