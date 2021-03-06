<?php

class Flight {

    /**
     * 飞行速度
     *
     * @var int
     */
    protected $speed;

    /**
     * 持续飞行时间
     *
     * @var  integer
     */
    protected $holdtime;

    /**
     * Flight constructor.
     *
     * @param int $speed
     * @param int $holdtime
     */
    public function __construct( $speed, $holdtime )
    {
        $this->speed    = $speed;
        $this->holdtime = $holdtime;
    }
}