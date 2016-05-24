<?php 
namespace app\math\location;

class LocationArithmeticConvert {
    protected $locationMap;
    protected $locationNumeral;
    protected $locationNotation;
    protected $maxPower = 25;
    
    private function _closestPowerFaster($numeral) {
        $answer = 1;
        $power = 0;
        while (($answer <= $numeral) && ($answer < 67108864)) {
            $answer *= 2;
            $power++;
        }
        
        return --$power;        
    }    

    private function _closestPower($numeral) {
        $power = 0;
        while (true) {
            $power++;
            if ((pow(2, $power) > $numeral) || ($power > $this->maxPower)) {
               return --$power;
            }
        }
    }

    private function _createLocationNotation($numeral) {
        $notationArray = array();
        while ($numeral > 0) {
            $closestPower = $this->_closestPower($numeral);
            $notationArray[] = $closestPower;
            $numeral -= pow(2, $closestPower);
        }
        $notationArrayRev = array_reverse($notationArray, true);
        $notationRet = '';
        foreach($notationArrayRev as $value) {
            $notationRet .= $this->locationMap[$value];
        }
        return $notationRet;
    }

    private function _createLocationNumeral($notation) {
        $notationArray = str_split($notation);
        $finalNotation = 0;
        foreach($notationArray as $key => $value) {
            $power = array_keys($this->locationMap, $value);
            $finalNotation += pow(2, $power[0]);
        }
        return $finalNotation;
    }

    public function __construct() {
        $this->locationMap = str_split('abcdefghijklmnopqrstuvwxyz');
    }

    public function getLocationNotation($input) {
        return $this->_createLocationNotation($input);
    }

    public function getLocationNumeral($notation) {
        return $this->_createLocationNumeral($notation);
    }

    public function abreviateLocationNotation($notation) {
        return $this->_createLocationNotation($this->_createLocationNumeral($notation));
    }
}
