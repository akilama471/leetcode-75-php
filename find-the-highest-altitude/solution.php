class Solution {

    /**
     * @param Integer[] $gain
     * @return Integer
     */
    function largestAltitude($gain) {
        $altitude = 0;       // පටන්ගන්නා උස
        $maxAltitude = 0;    // ඉහළම උස (initially 0)

        foreach ($gain as $g) {
            $altitude += $g;                 // නව altitude එක ගන්න
            $maxAltitude = max($maxAltitude, $altitude); // වැඩිම උස update කරන්න
        }

        return $maxAltitude;
    }
}
