<?php

namespace PedroTroller\TraceDebug;

use Exception;

class Tracer
{
    /**
     * @var TraceHandler[]
     */
    private static $handlers = [];

    /**
     * Capture the current stacktrace.
     *
     * @param string|null $identifier
     */
    public static function trace($identifier = null, $subtrace = 1, Exception $exception = null)
    {
        $exception = null === $exception ? new Exception() : $exception;
        $trace     = array_slice($exception->getTrace(), $subtrace);

        foreach (self::$handlers as $handler) {
            $handler->onTrace($trace, $identifier);
        }
    }

    /**
     * @param TraceHandler $handler
     */
    public function addHandler(TraceHandler $handler)
    {
        self::$handlers[] = $handler;
    }
}
