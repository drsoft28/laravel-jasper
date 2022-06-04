<?php
namespace Drsoft\LaravelJasper\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelJasper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'drsoft.laraveljasper';
    }
}