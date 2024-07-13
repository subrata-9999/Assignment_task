<?php

// Function to check if a value (string or number) is a palindrome
if (!function_exists('is_palindrome')) {
    function is_palindrome($input) {
        // Convert the input to a string
        $string = (string)$input;
        // Normalize the string (case-insensitive and remove non-alphanumeric characters)
        $normalizedString = strtolower(preg_replace('/[^A-Za-z0-9]/', '', $string));
        // Check if the normalized string is equal to its reverse
        return $normalizedString === strrev($normalizedString);
    }
}

// Function to find unique values in an array using a loop
if (!function_exists('find_unique_values')) {
    function find_unique_values($array) {
        $uniqueValues = [];
        foreach ($array as $value) {
            if (!in_array($value, $uniqueValues)) {
                $uniqueValues[] = $value;
            }
        }
        return $uniqueValues;
    }
}

// Function to count duplicate values in an array using a loop
if (!function_exists('count_duplicate_values')) {
    function count_duplicate_values($array) {
        $counts = [];
        $duplicates = [];

        // Count occurrences of each value
        foreach ($array as $value) {
            if (isset($counts[$value])) {
                $counts[$value]++;
            } else {
                $counts[$value] = 1;
            }
        }

        // Find duplicates
        foreach ($counts as $value => $count) {
            if ($count > 1) {
                $duplicates[$value] = $count;
            }
        }

        return $duplicates;
    }
}
