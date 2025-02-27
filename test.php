<?php
function longestPalindrome($s) {
    $maxPal = "";
    $n = strlen($s);
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i; $j < $n; $j++) {
            $sub = substr($s, $i, $j - $i + 1);
            if ($sub === strrev($sub) && strlen($sub) > strlen($maxPal)) {
                $maxPal = $sub;
            }
        }
    }
    return $maxPal;
}

// Usage examples:
$inputs = [
    "abac",            // Expected output: "aba"
    "tacag",           // Expected output: "aca"
    "wegeeksskeegyuwe" // Expected output: "geeksskeeg"
];

foreach ($inputs as $input) {
    echo "Input: $input\n";
    echo "Output: " . longestPalindrome($input) . "\n\n";
}
