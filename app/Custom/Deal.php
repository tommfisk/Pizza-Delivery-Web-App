<?php

namespace App\Custom;

class Deal
{
    static function bogOf($medium_pizzas, $large_pizzas) : bool {
        foreach($medium_pizzas as $pizza_id => $quantity) {
            if(count($medium_pizzas) >= 2 || $quantity >= 2) {
                return true;
            }
        }

        foreach($large_pizzas as $pizza_id => $quantity) {
            if(count($large_pizzas) >= 2 || $quantity >= 2) {
                return true;
            }
        }

        return false;
    }

    static function threeForTwo($pizzas, $via) : bool {
        return true;
    }

    static function familyFeast($pizzas, $via) : bool {
        return true;
    }

    static function twoLarge($pizzas, $via) : bool {
        return true;
    }

    static function twoMedium($pizzas, $via) : bool {
        return true;
    }

    static function twoSmall($pizzas, $via) : bool {
        return true;
    }
}
