<?php namespace YCMS\Facades;

/**
 * Created by PhpStorm.
 * User: Mo
 * Date: 15-7-5
 * Time: 上午7:18
 */

use Illuminate\Support\Facades\Facade;

class Y extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor() { return 'Y'; }
}

