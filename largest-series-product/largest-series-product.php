<?php

Class Series
{
    private $digits;

    public function __construct(string $digits)
    {
        $this->digits = $digits;
    }

    public function largestProduct(int $substringLength) : int
    {
        $this->validateInputs($this->digits, $substringLength);

        $number = array_map('intval', str_split($this->digits));
        $arrayLength = count($number);
        $largestProduct = 0;

        for ($i = 0; $i < $arrayLength - $substringLength + 1; $i++)
        {
            $currentProduct = 1;
            for ($j = 0; $j < $substringLength; $j++)
            {
                $currentProduct *= $number[$i + $j];
            }
            
            $largestProduct = max($currentProduct, $largestProduct);
        }

    return $largestProduct;
    }

    private function validateInputs(string $digits, int $substringLength)
    {
        if ($substringLength < 0 ||
            strlen($digits) == 0 && $substringLength > 0 ||
            $substringLength > strlen($this->digits) ||
            strlen($digits) > 0 && !is_numeric($digits))
        {  throw new InvalidArgumentException; }
    }

}
