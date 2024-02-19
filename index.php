<?php

$expression = ['1', '+', '2', '*', '3', '/', '2', '-', '1'];

// Function to perform multiplication and division operations
function evaluateMultiplicationDivision(&$tokens) {
    $i = 0;
    while ($i < count($tokens)) {
        if ($tokens[$i] == '*') {
            $result = $tokens[$i - 1] * $tokens[$i + 1];
            array_splice($tokens, $i - 1, 3, $result);
        } elseif ($tokens[$i] == '/') {
            $result = $tokens[$i - 1] / $tokens[$i + 1];
            array_splice($tokens, $i - 1, 3, $result);
        } else {
            $i++;
        }
    }
}

// Evaluate multiplication and division operations
evaluateMultiplicationDivision($expression);

// Function to perform addition and subtraction operations
function evaluateAdditionSubtraction($tokens) {
    $result = $tokens[0];
    for ($i = 1; $i < count($tokens); $i += 2) {
        if ($tokens[$i] == '+') {
            $result += $tokens[$i + 1];
        } elseif ($tokens[$i] == '-') {
            $result -= $tokens[$i + 1];
        } else {
            throw new InvalidArgumentException("Invalid operator: {$tokens[$i]}");
        }
    }
    return $result;
}


$result = evaluateAdditionSubtraction($expression);

echo "Result of the operation: $result";

?>
