# Installation

`composer require bendamqui/fp`

## Functions

### pipe(\Closure ...$fns)(mixed $initialValue = null)
Apply functions to initial value from left to right.

````php
function add($x) {
    return function($y) use ($x) {
        return $x + $y;
    };
}
pipe(add(1), add(2), add(4))(0); // => 7
````

### compose(\Closure ...$fns)(mixed $initialValue = null)
Apply functions to initial value from right to left.

````php
function add($x) {
    return function($y) use ($x) {
        return $x + $y;
    };
}
compose(add(1), add(2), add(3))(0); // => 6
````
