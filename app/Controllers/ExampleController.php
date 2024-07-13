<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ExampleController extends BaseController
{
    public function index()
    {
        helper('custom'); 

        // Now you can use the functions
        $isStringPalindrome = is_palindrome('Madam');
        $isNumberPalindrome = is_palindrome(12321);
        $uniqueValues = find_unique_values([1, 2, 2, 3, 4, 4, 5]);
        $duplicateCounts = count_duplicate_values([1, 2, 2, 3, 4, 4, 5]);

        // Pass data to view or handle it as needed
        return view('example_view', [
            'isStringPalindrome' => $isStringPalindrome,
            'isNumberPalindrome' => $isNumberPalindrome,
            'uniqueValues' => $uniqueValues,
            'duplicateCounts' => $duplicateCounts
        ]);
    }
}
