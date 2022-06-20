<?php

namespace Msr\ActionPolicy\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Msr\ActionPolicy\ActionPolicy
 */
class ActionPolicy extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-action-policy';
    }
}
