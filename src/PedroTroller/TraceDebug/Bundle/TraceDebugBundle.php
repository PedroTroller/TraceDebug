<?php

namespace PedroTroller\TraceDebug\Bundle;

use PedroTroller\TraceDebug\DependencyInjection\TraceDebugExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class TraceDebugBundle extends Bundle
{
    public function boot()
    {
        $tracer = $this->container->get('trace_debug.tracer');
    }

    public function getPath()
    {
        return dirname(parent::getPath());
    }

    public function getContainerExtension()
    {
        return new TraceDebugExtension;
    }
}
