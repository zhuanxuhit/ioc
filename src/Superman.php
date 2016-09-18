<?php

class Superman {

    protected $power;

    public function __construct()
    {
        $this->power = new Power( 999, 100 );
    }
}