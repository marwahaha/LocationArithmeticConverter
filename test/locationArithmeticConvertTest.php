<?php 

namespace test;

require_once '../app/math/location/LocationArithmeticConvert.class.php';

class StupidTest extends\PHPUnit_Framework_TestCase {
    public function testLowThreshold() {
        $locat = new LocationArithmeticConvert();

        $this->assertEquals($locat->getLocationNumeral('a'), 1);
        $this->assertEquals($locat->abreviateLocationNotation('a'), 'a');
        $this->assertEquals($locat->getLocationNotation(1), 'a');
    }

    public function testHighThreshold() {
        $locat = new LocationArithmeticConvert();

        $this->assertEquals($locat->getLocationNumeral('z'), 33554432);
        $this->assertEquals($locat->abreviateLocationNotation('z'), 'z');
        $this->assertEquals($locat->getLocationNotation(33554432), 'z');
    }

    public function testNine() {
        $locat = new LocationArithmeticConvert();

        $this->assertEquals($locat->getLocationNumeral('abbc'), 9);
        $this->assertEquals($locat->abreviateLocationNotation('abbc'), 'ad');
        $this->assertEquals($locat->getLocationNotation(9), 'ad');
    }

    public function testEightSeven() {
        $locat = new LocationArithmeticConvert();

        $this->assertEquals($locat->getLocationNumeral('abceg'), 87);
        $this->assertEquals($locat->abreviateLocationNotation('abceg'), 'abceg');
        $this->assertEquals($locat->getLocationNotation(87), 'abceg');
    }

    public function testThreeOneFourSeven() {
        $locat = new LocationArithmeticConvert();

        $this->assertEquals($locat->getLocationNumeral('abdgkl'), 3147);
        $this->assertEquals($locat->abreviateLocationNotation('abdgkl'), 'abdgkl');
        $this->assertEquals($locat->getLocationNotation(3147), 'abdgkl');
    }

    public function testLimit() {
        $locat = new LocationArithmeticConvert();

        $this->assertEquals($locat->getLocationNumeral('aabcdefghijklmnopqrstuvwxyz'), 33554432);
        $this->assertEquals($locat->abreviateLocationNotation('aabcdefghijklmnopqrstuvwxyz'), 'zz');
        $this->assertEquals($locat->getLocationNotation(33554432), 'zz');
    }
}

/*
$locat = new LocationArithmeticConvert();
echo $locat->getLocationNumeral('abbc');
echo "\n";
echo $locat->abreviateLocationNotation('abbc');
echo "\n";
echo $locat->getLocationNotation(9);
echo "\n\n";
echo $locat->getLocationNumeral('abceg');
echo "\n";
echo $locat->abreviateLocationNotation('abceg');
echo "\n";
echo $locat->getLocationNotation(87);
echo "\n\n";
echo $locat->getLocationNumeral('abdgkl');
echo "\n";
echo $locat->abreviateLocationNotation('abdgkl');
echo "\n";
echo $locat->getLocationNotation(3147);
echo "\n\n";
echo $locat->getLocationNumeral('z');
echo "\n";
echo $locat->abreviateLocationNotation('z');
echo "\n";
echo $locat->getLocationNotation(33554432);
echo "\n\n";
echo $locat->getLocationNumeral('aabcdefghijklmnopqrstuvwxyz');
echo "\n";
echo $locat->abreviateLocationNotation('aabcdefghijklmnopqrstuvwxyz');
echo "\n";
echo $locat->getLocationNotation(67108864);
echo "\n\n";
echo $locat->getLocationNotation(67108865);
echo "\n\n";
echo $locat->getLocationNumeral('a');
echo "\n";
echo $locat->abreviateLocationNotation('a');
echo "\n";
echo $locat->getLocationNotation(1);
*/