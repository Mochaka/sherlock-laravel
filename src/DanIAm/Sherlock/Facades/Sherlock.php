<?php namespace DanIAm\Sherlock\Facades;

use Illuminate\Support\Facades\Facade;

class Sherlock extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'sherlock';
    }

}
