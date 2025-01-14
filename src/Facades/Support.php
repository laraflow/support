<?php

namespace Laraflow\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * // Crud Service Method Point Do not Remove //
 *
 * @see \Laraflow\Support\Support
 */
class Support extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Laraflow\Support\Support::class;
    }
}
