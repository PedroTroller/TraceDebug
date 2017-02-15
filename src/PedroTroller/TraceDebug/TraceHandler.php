<?php

namespace PedroTroller\TraceDebug;

interface TraceHandler
{
    /**
     * @param array       $trace
     * @param string|null $identifier
     */
    public function onTrace(array $trace, $identifier = null);
}
