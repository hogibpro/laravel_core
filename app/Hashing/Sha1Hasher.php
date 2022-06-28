<?php

namespace App\Hashing;

use App\Hashing\Hasher;

class Sha1Hasher implements Hasher
{
    private $salt;

    public function __construct($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @param string $value
     * @return string
     */
    public function make($value)
    {
        return sha1($value . $this->salt);
    }

    /**
     * @param string $value
     * @param string $hasher
     * @return boolean
     */
    public function verify($value, $hasher)
    {
        return $this->make($value) === $hasher;
    }
}