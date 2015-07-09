<?php namespace Swiggles\Hashids\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Hashids facade class.
 */
class Hashids extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'hashids';
    }
}
