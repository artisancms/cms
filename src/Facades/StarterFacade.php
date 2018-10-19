<?php

namespace ArtisanCMS\CMS\Facades;

use Illuminate\Support\Facades\Facade;

class StarterFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'starter';
    }
}
