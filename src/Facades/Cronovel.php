<?php 

namespace DevCircus\Cronovel\Facades;

use Illuminate\Support\Facades\Facade;

class Cronovel extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cronovel';
    }
}