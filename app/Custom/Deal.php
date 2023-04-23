<?php

namespace App\Custom;

use App\Models\Pizza;

class Deal
{
    static function bogof() : bool {

        $pizzas = Pizza::all();

        return false;


    }

    static function threeForTwo($order, $via) : bool {
        return true;
    }

    static function familyFeast($order, $via) : bool {
        return true;
    }

    static function twoLarge($order, $via) : bool {
        return true;
    }

    static function twoMedium($order, $via) : bool {
        return true;
    }

    static function twoSmall($order, $via) : bool {
        return true;
    }
}
