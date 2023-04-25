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

        $prices = [];

        foreach ($_SESSION['pizzas_with_no_deal_applied'] as $key => $pizza) {
            if ($pizza[2] == $size) {
                $_SESSION['pizzas_with_deal_applied'][] = $_SESSION['pizzas_with_no_deal_applied'][$key];
                $prices[] = $pizza[3];
                unset($_SESSION['pizzas_with_no_deal_applied'][$key]);

            }

            rsort($prices);

            if (count($_SESSION['pizzas_with_deal_applied']) == 2) {
                $_SESSION['deal_price'] = $prices[0];
                return true;
            }
        }

        return false;
    }

    static function threeForTwo() : bool {
        Deal::reset();

        $prices = [];

        foreach ($_SESSION['pizzas_with_no_deal_applied'] as $key => $pizza) {
            if ($pizza[2] == 'medium') {
                $_SESSION['pizzas_with_deal_applied'][] = $_SESSION['pizzas_with_no_deal_applied'][$key];
                $prices[] = $pizza[3];
                unset($_SESSION['pizzas_with_no_deal_applied'][$key]);
            }

            rsort($prices);

            if (count($_SESSION['pizzas_with_deal_applied']) == 3) {
                $_SESSION['deal_price'] = $prices[0] + $prices[1];
                return true;
            }
        }

        return false;
    }

    static function familyFeast() : bool {
        Deal::reset();

        foreach ($_SESSION['pizzas_with_no_deal_applied'] as $key => $pizza) {
            if ($pizza[2] == 'medium') {
                $_SESSION['pizzas_with_deal_applied'][] = $_SESSION['pizzas_with_no_deal_applied'][$key];
                unset($_SESSION['pizzas_with_no_deal_applied'][$key]);
            }

            if (count($_SESSION['pizzas_with_deal_applied']) == 4) {
                $_SESSION['deal_price'] = 30.00;
                return true;
            }
        }
        return false;
    }

    static function twoLarge() : bool {
        Deal::reset();

        foreach ($_SESSION['pizzas_with_no_deal_applied'] as $key => $pizza) {
            if ($pizza[2] == 'large') {
                $_SESSION['pizzas_with_deal_applied'][] = $_SESSION['pizzas_with_no_deal_applied'][$key];
                unset($_SESSION['pizzas_with_no_deal_applied'][$key]);
            }

            if (count($_SESSION['pizzas_with_deal_applied']) == 2) {
                $_SESSION['deal_price'] = 25.00;
                return true;
            }
        }

        return false;
    }

    static function twoMedium() : bool {
        Deal::reset();

        foreach ($_SESSION['pizzas_with_no_deal_applied'] as $key => $pizza) {
            if ($pizza[2] == 'medium') {
                $_SESSION['pizzas_with_deal_applied'][] = $_SESSION['pizzas_with_no_deal_applied'][$key];
                unset($_SESSION['pizzas_with_no_deal_applied'][$key]);
            }

            if (count($_SESSION['pizzas_with_deal_applied']) == 2) {
                $_SESSION['deal_price'] = 18.00;
                return true;
            }
        }

        return false;
    }

    static function twoSmall() : bool {
        Deal::reset();

        foreach ($_SESSION['pizzas_with_no_deal_applied'] as $key => $pizza) {
            if ($pizza[2] == 'small') {
                $_SESSION['pizzas_with_deal_applied'][] = $_SESSION['pizzas_with_no_deal_applied'][$key];
                unset($_SESSION['pizzas_with_no_deal_applied'][$key]);
            }

            if (count($_SESSION['pizzas_with_deal_applied']) == 2) {
                $_SESSION['deal_price'] = 12.00;
                return true;
            }
        }

        return false;
    }
}
