<?php
namespace App\Facades;

use App\Http\Controllers\HumanController;

class HumanFacade extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return HumanController::class;
    }
}