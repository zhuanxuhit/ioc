<?php

/**
 * 怪物
 * Class Monster
 */
class Monster {
    protected $name;

    /**
     * Monster constructor.
     *
     * @param $name
     */
    public function __construct( $name )
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}