<?php

namespace App\Database;

class First
{


    private Second $second;

    public function __construct(Second $second)
    {
        $this->second = $second;
    }

    public function getDependency()
    {
        return $this->second;
    }
}