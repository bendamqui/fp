<?php

namespace Bendamqui\Fp;

/**
 * Apply functions from left to right.
 *
 * @param \Closure ...$fns
 * @return \Closure
 */
function pipe(\Closure ...$fns): \Closure
{
    return function ($initial = null) use ($fns) {
        return array_reduce($fns, function ($acc, $fn) {
            return $fn($acc);
        }, $initial);
    };
}

/**
 * Apply functions from right to left.
 *
 * @param \Closure ...$fns
 * @return \Closure
 */
function compose(\Closure ...$fns)
{
    return function ($initial = null) use ($fns) {
        return array_reduce(array_reverse($fns), function ($acc, $fn) {
            return $fn($acc);
        }, $initial);
    };
}

