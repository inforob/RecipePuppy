<?php
/* /src/Service/DniGenerator.php */
namespace App\Service;

class DniGenerator
{
    private static $crcMap = array('T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T');
    public static function dni()
    {
        $number = static::randomNumber(8);
        $letter = self::$crcMap[$number % 23];
        return $number . $letter;
    }
    /**
     * Devuelve un entero con $numberDigits digitos
     * @param integer $numberDigits
     * @example 79907610
     * @return integer
     */
    public static function randomNumber($numberDigits = 1)
    {
        $max = pow(10, $numberDigits) - 1;
        if ($max > mt_getrandmax()) {
            throw new \InvalidArgumentException('randomNumber() can only generate numbers up to mt_getrandmax()');
        }
        return mt_rand(pow(10, $numberDigits - 1), $max);
    }
}