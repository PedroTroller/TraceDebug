<?php

namespace PedroTroller\TraceDebug;

interface TraceHandler
{
    /**
     * @param array $trace
     * @param string|null $identifier
     *
     * @return void
     */
    public function onTrace(array $trace, $identifier = null);
}
