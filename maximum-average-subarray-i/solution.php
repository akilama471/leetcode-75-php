class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Float
     */
    function findMaxAverage($nums, $k) {
        $n = count($nums);

        // Step 1: Initial window sum
        $windowSum = array_sum(array_slice($nums, 0, $k));
        $maxSum = $windowSum;

        // Step 2: Slide the window
        for ($i = $k; $i < $n; $i++) {
            $windowSum += $nums[$i] - $nums[$i - $k];
            if ($windowSum > $maxSum) {
                $maxSum = $windowSum;
            }
        }

        // Step 3: Return maximum average
        return $maxSum / $k;
    }
}
