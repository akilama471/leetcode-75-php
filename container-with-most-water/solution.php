/*
You are given an integer array height of length n. There are n vertical lines drawn such that the two endpoints of the ith line are (i, 0) and (i, height[i]).

Find two lines that together with the x-axis form a container, such that the container contains the most water.

Return the maximum amount of water a container can store.

Notice that you may not slant the container.
*/

class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $maxArea = 0;
        $left = 0;
        $right = count($height) - 1;

        while ($left < $right) {
            $currentArea = min($height[$left], $height[$right]) * ($right - $left);
            $maxArea = max($maxArea, $currentArea);

            if ($height[$left] < $height[$right]) {
                $left++;
            } else {
                $right--;
            }
        }

        return $maxArea;
    }
}