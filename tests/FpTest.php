<?php

namespace Test;

use PHPUnit\Framework\TestCase;

use function Bendamqui\Fp\{
    pipe,
    compose
};

class FpTest extends TestCase
{
    public function testPipeAppliesMultipleFunctions()
    {
        $result = pipe(
            $this->add(0),
            $this->add(1)
        )(2);
        $this->assertEquals(3, $result);
    }

    public function testComposeAppliesMultipleFunctions()
    {
        $result = compose(
            $this->add(0),
            $this->add(1)
        )(2);
        $this->assertEquals(3, $result);
    }

    public function testPipeAppliesFunctionsFromLeftToRight()
    {
        $result = pipe(
          $this->add(1),
          $this->multiply(0),
          $this->add(1),
          $this->add(2)
        )(0);

        $this->assertEquals(3, $result);
    }

    public function testComposeAppliesFunctionsFromRightToLeft()
    {
        $result = compose(
            $this->add(2),
            $this->add(1),
            $this->multiply(0),
            $this->add(1)
        )(0);

        $this->assertEquals(3, $result);
    }

    /**
     * @param int $x
     * @return \Closure
     */
    public function add(int $x)
    {
        return function (int $y) use ($x): int {
            return $x + $y;
        };
    }

    /**
     * @param int $x
     * @return \Closure
     */
    public function multiply(int $x)
    {
        return function (int $y) use ($x): int {
            return $x * $y;
        };
    }
}
