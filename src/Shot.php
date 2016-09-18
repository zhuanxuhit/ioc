<?php

class Shot {

    /**
     * 伤害值
     */
    protected $atk;
    /**
     * 射击距离
     */
    protected $range;
    /**
     * 同时射击个数
     */
    protected $limit;

    /**
     * Shot constructor.
     *
     * @param $atk
     * @param $range
     * @param $limit
     */
    public function __construct( $atk, $range, $limit )
    {
        $this->atk   = $atk;
        $this->range = $range;
        $this->limit = $limit;
    }
}