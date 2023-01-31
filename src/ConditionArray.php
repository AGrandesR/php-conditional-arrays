<?php

namespace Agrandesr;

use Error;
use Exception;

class ConditionArray {
    static function check(array $boolArray) : bool {
        if(Count($boolArray)!==3) throw new Exception("There are not only 3 elements in a condition row.",1001);
        list($var1,$condition,$var2) = $boolArray;

        //Array check conditions
        switch ($condition) {
            case "IN":
                return in_array($var1,$var2);
        }

        if(is_array($var1)) $var1 = self::check($var1);
        if(is_array($var2)) $var2 = self::check($var2);
        switch ($condition) {
            case "==":
                return $var1 == $var2;
            case "===":
                return $var1 === $var2;
            case "!=":
                return $var1 != $var2;
            case "!==":
                return $var1 !== $var2;
            case ">":
                return $var1 > $var2;
            case ">=":
            case "=>":
                return $var1 >= $var2;
            case "<":
                return $var1 < $var2;
            case "<=":
            case "=<":
                return $var1 <= $var2;
            case "&&":
                return $var1 && $var2;
            case "||":
                return $var1 || $var2;
        }
        throw new Exception("Not valid condition: $condition", 1002);
    }
}