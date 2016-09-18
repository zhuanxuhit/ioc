<?php

class Power {

    /**
     * 能力值
     */
    protected $ability;

    /**
     * 能力范围或距离
     */
    protected $range;

    public function __construct( $ability, $range )
    {
        $this->ability = $ability;
        $this->range   = $range;
    }
}