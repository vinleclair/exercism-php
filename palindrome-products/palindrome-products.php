<?php

/**
 * Given a range, returns the smallest palindrome along with its factors
 * @param int $start range start value
 * @param int $end range end value
 * @return array [ $value, $factors ]
 */
function smallest(int $start, int $end) : array
{
    $smallest = min(palindromeProducts($start, $end));
    return [$smallest, factorsInRange($smallest, $start, $end)];
}

/**
 * Given a range, returns the largest palindrome along with its factors
 * @param int $start range start value
 * @param int $end range end value
 * @return array [ $value, $factors ]
 */
function largest(int $start, int $end) : array
{
    $largest = max(palindromeProducts($start, $end));
    return [$largest, factorsInRange($largest, $start, $end)];
}

/**
 * Given a range, returns all different palindrome products
 * @param int $start range start value
 * @param int $end range end value
 * @throws Exception if $end <= $start
 * @throws Exception if palindromesProducts is empty
 * @return array $palindromeProducts
 */
function palindromeProducts(int $start, int $end) : array
{
    validateRange($start, $end);
    $palindromeProducts = [];

    foreach(productsInRange($start, $end) as $product) {
        if (isPalindrome($product) && !in_array($product, $palindromeProducts)) {
            $palindromeProducts[] = $product;
        }
    }
    if (empty($palindromeProducts)) {
        throw new \Exception;
    }
    return $palindromeProducts;
}

/**
 * Given a number, returns true if that number is a palindrome, else false
 * @param int $number
 * @return bool
 */
function isPalindrome(int $number) : bool
{
    return "$number" === strrev("$number");
}

/**
 * Given a number, returns all factors in the specified range
 * @param int $number
 * @param int $start range start value
 * @param int $end range end value
 * @throws Exception if $end <= $start
 * @return array $factors
 */
function factorsInRange(int $number, int $start, int $end) : array 
{
    validateRange($start, $end);
    $factors = [];

    foreach (range($start, $end) as $num1) {
        foreach (range($num1, $end) as $num2) {
            if ($num1 * $num2 === $number) {
                $factors[] = [$num1, $num2];
            }
        }
    }

    return $factors;
}

/**
 * Given a range, returns an array of all different products 
 * @param int $start range start value
 * @param int $end range end value
 * @return array products
 */
function productsInRange(int $start, int $end) : array
{
    $products = [];

    foreach (range($start, $end) as $num1) {
        foreach (range($num1, $end) as $num2) {
            $product = $num1 * $num2;
            if (!in_array($product, $products)) {
                $products[] = $product;
            }
        }
    }

    return $products;
}

/**
 * Given a range, throws an exception if the end value is smaller or equal to the start value
 * @param int $start range start value
 * @param int $end range end value
 */
function validateRange(int $start, int $end)  
{
    if ($end <= $start) {
        throw new \Exception;
    }
}

