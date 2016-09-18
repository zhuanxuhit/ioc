<?php

class Force {

    /**
     * 力量值
     * @var int
     */
    protected $force;

    public function __construct( $force )
    {
        $this->force = $force;
    }

    /**
     * @return int
     */
    public function getForce(): int
    {
        return $this->force;
    }

}