/*
Given an encoded string, return its decoded string.

The encoding rule is: k[encoded_string], where the encoded_string inside the square brackets is being repeated exactly k times. Note that k is guaranteed to be a positive integer.

You may assume that the input string is always valid; there are no extra white spaces, square brackets are well-formed, etc. Furthermore, you may assume that the original data does not contain any digits and that digits are only for those repeat numbers, k. For example, there will not be input like 3a or 2[4].

The test cases are generated so that the length of the output will never exceed 105.

 

Example 1:

Input: s = "3[a]2[bc]"
Output: "aaabcbc"
Example 2:

Input: s = "3[a2[c]]"
Output: "accaccacc"
Example 3:

Input: s = "2[abc]3[cd]ef"
Output: "abcabccdcdcdef"
 

Constraints:

1 <= s.length <= 30
s consists of lowercase English letters, digits, and square brackets '[]'.
s is guaranteed to be a valid input.
All the integers in s are in the range [1, 300].
*/

<?php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function decodeString($s) {
        $numStack = [];
        $strStack = [];
        $currentNum = 0;
        $currentStr = "";

        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];

            if (ctype_digit($char)) {
                // Build the number (could be more than one digit)
                $currentNum = $currentNum * 10 + intval($char);
            } elseif ($char === "[") {
                // Push the current string and number into stacks
                array_push($numStack, $currentNum);
                array_push($strStack, $currentStr);
                // Reset for next substring
                $currentNum = 0;
                $currentStr = "";
            } elseif ($char === "]") {
                // Pop the last number and last string
                $repeatTimes = array_pop($numStack);
                $prevStr = array_pop($strStack);
                // Repeat the current string and append
                $currentStr = $prevStr . str_repeat($currentStr, $repeatTimes);
            } else {
                // Normal character, just add to current string
                $currentStr .= $char;
            }
        }

        return $currentStr;
    }
}

// Example usage:
$solution = new Solution();
echo $solution->decodeString("3[a]2[bc]") . PHP_EOL; // Output: aaabcbc
echo $solution->decodeString("3[a2[c]]") . PHP_EOL; // Output: accaccacc
echo $solution->decodeString("2[abc]3[cd]ef") . PHP_EOL; // Output: abcabccdcdcdef
