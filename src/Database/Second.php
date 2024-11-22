<?php

namespace App\Database;

class Second
{
    private Third $third;

    public function __construct(Third $third)
    {
        $this->third = $third;
    }

    public function getDependency()
    {
        return $this->third;
    }
}