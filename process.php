<?php

/**
 * Checks if a given number is prime.
 * @param int $number The number to check.
 * @return bool True if the number is prime, false otherwise.
 */
function is_prime(int $number): bool {
    if ($number <= 1) {
        return false;
    }
    // Check divisibility up to the square root of the number
    for ($i = 2; $i * $i <= $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

// --- Configuration ---
$min_range = 100;
$max_range = 1000;
$count_to_find = 5;

// --- Generation Logic ---
$random_primes = [];
$attempts = 0;
$max_attempts = 1000; // Prevent infinite loop in sparse ranges

echo "Searching for $count_to_find unique prime numbers between $min_range and $max_range:\n";

while (count($random_primes) < $count_to_find && $attempts < $max_attempts) {
    // Generate a random number within the range
    $random_number = rand($min_range, $max_range);
    
    // Check if it's prime and not already found
    if (is_prime($random_number) && !in_array($random_number, $random_primes)) {
        $random_primes[] = $random_number;
    }
    $attempts++;
}

// --- Output ---
if (count($random_primes) > 0) {
    echo "Found " . count($random_primes) . " primes:\n";
    echo implode(", ", $random_primes);
} else {
    echo "Could not find any unique primes in $max_attempts attempts or the range is too small.";
}

?>
