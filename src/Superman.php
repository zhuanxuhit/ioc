<?php

class Superman {

    protected $power;

    public function __construct()
    {
        $this->power = new Flight(9, 100);
        // $this->power = new Force(45);
        // $this->power = new Shot(99, 50, 2);
        /*
        $this->power = array(
            new Force(45),
            new Shot(99, 50, 2)
        );
        */
    }
}