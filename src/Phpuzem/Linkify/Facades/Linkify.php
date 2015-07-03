<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Phpuzem\Linkify\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Description of Linkify
 *
 * @author webdeveloper
 */
class Linkify extends Facade {

    //put your code here
    protected static function getFacadeAccessor()
    {
        return 'linkify';
    }

}
