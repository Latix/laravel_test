<?php
namespace Tests\Unit;

use App\Math;
use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class MathTest extends MockeryTestCase
{
    public function setUp() : void
    {
        $this->calculate = m::mock('App\Calculate');

        $this->math = new Math($this->calculate);
    }

    public function test_getArea_WhenCalledWithLength2_Return4()
    {
        $this->calculate->shouldReceive('areaOfSquare')
            ->andReturn(4)
            ->once();

        $length = 2;

        $response = $this->math->getArea($length);

        $this->assertTrue(is_int($response));
        $this->assertEquals(4, $response);
    }
}
