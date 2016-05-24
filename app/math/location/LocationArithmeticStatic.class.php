<?php 
namespace app\math\location;

class LocationArithmeticConvert {
    private static $locationMap;
    private static $maxPower = 25;
    
    private function __construct() {}

    private static function _createLocationNotation($numeral) {
        $notationArray = array();
        while ($numeral > 0) {
            $closestPower =  ($tmpPower =  floor((log($numeral) / log(2)))) > self::$maxPower ? self::$maxPower : $tmpPower;
            $notationArray[] = $closestPower;
            $numeral -= pow(2, $closestPower);
        }
        $notationArrayRev = array_reverse($notationArray, true);
        $notationRet = '';
        foreach($notationArrayRev as $value) {
            $notationRet .= self::$locationMap[$value];
        }
        return $notationRet;
    }

    private static function _createLocationNumeral($notation) {
        $notationArray = str_split($notation);
        $finalNotation = 0;
        foreach($notationArray as $key => $value) {
            $power = array_keys(self::$locationMap, $value);
            $finalNotation += pow(2, $power[0]);
        }
        return $finalNotation;
    }
    
    private static function initialize() {
        self::$locationMap = str_split('abcdefghijklmnopqrstuvwxyz');
    }

    public static function getLocationNotation($input) {
        self::initialize();
        return self::_createLocationNotation($input);
    }

    public static function getLocationNumeral($notation) {
        self::initialize();
        return self::_createLocationNumeral($notation);
    }

    public static function abreviateLocationNotation($notation) {
        self::initialize();
        return self::_createLocationNotation(self::_createLocationNumeral($notation));
    }
}