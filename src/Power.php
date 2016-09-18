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

    /**
     * @return mixed
     */
    public function getAbility()
    {
        return $this->ability;
    }

    /**
     * @return mixed
     */
    public function getRange()
    {
        return $this->range;
    }

}