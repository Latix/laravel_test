<?php
namespace Tests\Unit;

use App\Calculate;
use PHPUnit\Framework\TestCase;

class CalculateTest extends TestCase
{
    public function setUp() : void
    {
        $this->calculate = new Calculate();
    }

    //test_nameOfTheMethodYouAreTesting_WhenCalledWithSomeInput_ShouldReceiveSomeExpectedOutput
    public function test_areaOfSquare_WhenCalledWithLength2_Return4()
    {
        $length = 2;

        $response = $this->calculate->areaOfSquare($length);

        $this->assertTrue(is_int($response));
        $this->assertEquals(4, $response);
    }

    public function test_areaOfSquare_WhenCalledWithoutLength_ThrowAnException()
    {
        $this->expectException('ArgumentCountError');
        $this->expectExceptionMessage('Too few arguments to function');

        $this->calculate->areaOfSquare();
    }
}
