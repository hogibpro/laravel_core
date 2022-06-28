<?php

namespace App\Hashing;

interface Hasher
{
    /**
     * 
     * @param string $value
     * @return string
     */
    public function make($value);

    /**
     * @param string $value
     * @param string $hasher
     * @return boolean
     */
    public function verify($value, $hasher);
}