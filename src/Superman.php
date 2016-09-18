<?php

class Superman {

    /** @var \SuperModuleInterface */
    protected $module;

    protected $power;

    public function __construct()
    {
        $this->power = new Power( 999, 100 );
//        $this->power = new Force(45);
//         $this->power = new Flight(99, 50);
    }

    public function attack( Monster $monster )
    {
        if ( $this->power instanceof Power ) {
            /** @var Power $power */
            $power = $this->power;
            echo sprintf("超人能力:%d,范围:%d\n",$power->getAbility(),$power->getRange());
        }
        else if ($this->power instanceof Flight){
            /** @var Flight $flight */
            $flight = $this->power;
            echo sprintf("飞行速度:%d,持续飞行时间:%d\n",$flight->getSpeed(),$flight->getHoldtime());
        }
        else if ($this->power instanceof Force){
            /** @var Force $force */
            $force = $this->power;
            echo sprintf("力量值:%d\n",$force->getForce());
        }
        else {

        }
    }

    public function magic()
    {
        $this->module->activate( [ ] );
    }

}