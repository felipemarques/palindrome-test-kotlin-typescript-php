<?php

/**
*Longest palindromic substring: Given a string, find the longest substring which is palindrome.
* Input: abac
* output: aba
*
* Input: tacag
* output: aca
*
* Input: wegeeksskeegyuwe,
* Output: "geeksskeeg" 
* 
*/

/**
 * The expand function is designed to find the longest palindrome centered at the given indices $left and $right.
 * Using this approach we can be more performatic and could be applied for more big entries.
 * 
 * Big O: 
 */
function searchCenteredPalindrome($s, $left, $right) {
    while ($left >= 0 && $right < strlen($s) && $s[$left] === $s[$right]) {
        $left--;
        $right++;
    }
    return substr($s, $left + 1, $right - $left - 1);  
}

function palindrome($str) {
    $result = "";
    $len = strlen($str);

    if ($len < 2) {
        return $str;
    }

    for ($i = 0; $i < $len; $i++) {
        
        // Check for odd-length palindromes
        $pal1 = searchCenteredPalindrome($str, $i, $i);
        
        // Check for even-length palindromes
        $pal2 = searchCenteredPalindrome($str, $i, $i + 1);

        if (strlen($pal1) > strlen($result)) {
            $result = $pal1;
        }

        if (strlen($pal2) > strlen($result)) {
            $result = $pal2;
        }
    }

    return $result;

}

$expected = [
    [
        'input' => 'abac',
        'output' => 'aba',
    ],
    [
        'input' => 'tacag',
        'output' => 'aca',
    ],
    [
        'input' => 'wegeeksskeegyuwe',
        'output' => 'geeksskeeg',
    ],

];

foreach ($expected as $expect) {
    echo (palindrome($expect['input']) == $expect['output'] ? 'ok' : 'invalid') . PHP_EOL;    
}
