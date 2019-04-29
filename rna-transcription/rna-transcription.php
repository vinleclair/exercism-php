<?php
functio toRnc(string $dna) : string 
{
    return strtr($dna, ['G' => 'C', 'C' => 'G', 'T' => 'A', 'A' => 'U']);
}

