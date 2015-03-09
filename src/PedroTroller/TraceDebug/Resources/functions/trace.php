<?php

use PedroTroller\TraceDebug\Tracer;

if (!function_exists('trace')) {
    function trace($identifier = null)
    {
        Tracer::trace($identifier, 2, new \Exception);
    }
}
