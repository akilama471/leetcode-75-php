/*
Given a string s and an integer k, return the maximum number of vowel letters in any substring of s with length k.

Vowel letters in English are 'a', 'e', 'i', 'o', and 'u'.

 

Example 1:

Input: s = "abciiidef", k = 3
Output: 3
Explanation: The substring "iii" contains 3 vowel letters.
Example 2:

Input: s = "aeiou", k = 2
Output: 2
Explanation: Any substring of length 2 contains 2 vowels.
Example 3:

Input: s = "leetcode", k = 3
Output: 2
Explanation: "lee", "eet" and "ode" contain 2 vowels.
 

Constraints:

1 <= s.length <= 105
s consists of lowercase English letters.
1 <= k <= s.length
*/

<?php
class Solution {

    function maxVowels($s, $k) {
        $maxVowels = 0;
        $currentVowels = 0;

        for ($i = 0; $i < strlen($s); $i++) {
            if (in_array($s[$i], ['a', 'e', 'i', 'o', 'u'])) {
                $currentVowels++;
            }

            if ($i >= $k) {
                if (in_array($s[$i - $k], ['a', 'e', 'i', 'o', 'u'])) {
                    $currentVowels--;
                }
            }

            $maxVowels = max($maxVowels, $currentVowels);
        }

        return $maxVowels;
    }
}