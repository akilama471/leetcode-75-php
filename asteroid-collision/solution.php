<?php
class Solution {
    function asteroidCollision($asteroids) {
        $stack = [];

        foreach ($asteroids as $asteroid) {
            $alive = true;

            while ($alive && $asteroid < 0 && !empty($stack) && end($stack) > 0) {
                $top = end($stack);

                if ($top < abs($asteroid)) {
                    // Top asteroid is smaller, it explodes
                    array_pop($stack);
                    continue;
                } elseif ($top == abs($asteroid)) {
                    // Both are equal, both explode
                    array_pop($stack);
                    $alive = false;
                    break;
                } else {
                    // Top is bigger, current asteroid explodes
                    $alive = false;
                    break;
                }
            }

            if ($alive) {
                $stack[] = $asteroid;
            }
        }

        return $stack;
    }
}
