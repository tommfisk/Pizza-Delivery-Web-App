<?php

namespace App\Custom;

class Deal
{
    static function reset() : void {
        $_SESSION['pizzas_with_no_deal_applied'] = $_SESSION['order'];

        $_SESSION['pizzas_with_deal_applied'] = [];
    }

    static function bogof($size) : bool {
        Deal::reset();

        foreach ($_SESSION['pizzas_with_no_deal_applied'] as $key => $pizza) {
            if ($pizza[2] == $size) {
                $_SESSION['pizzas_with_deal_applied'][] = $_SESSION['pizzas_with_no_deal_applied'][$key];
                unset($_SESSION['pizzas_with_no_deal_applied'][$key]);

            }

            if (count($_SESSION['pizzas_with_deal_applied']) == 2) {
                $_SESSION['deal_price'] =
                    max(
                        $_SESSION['pizzas_with_deal_applied'][0][3],
                        $_SESSION['pizzas_with_deal_applied'][1][3]
                    );
                return true;
            }
        }

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
