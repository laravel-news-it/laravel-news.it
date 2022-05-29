<?php

namespace TightenCo\Jigsaw\Events;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;

class FakeDispatcher implements DispatcherContract
{
    public function listen($events, $listener = null)
    {
    }

    public function hasListeners($eventName)
    {
    }

    public function subscribe($subscriber)
    {
    }

    public function until($event, $payload = [])
    {
    }

    public function dispatch($event, $payload = [], $halt = false)
    {
    }

    public function push($event, $payload = [])
    {
    }

    public function flush($event)
    {
    }

    public function forget($event)
    {
    }

    public function forgetPushed()
    {
    }
}
