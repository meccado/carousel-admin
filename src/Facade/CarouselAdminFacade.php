<?php
namespace Meccado\CarouselAdmin\Facade;
use Illuminate\Support\Facades\Facade;

class CarouselAdminFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'carousel_admin';
    }
}
