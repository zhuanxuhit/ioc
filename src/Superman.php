<?php

class Superman {

    /** @var \SuperModuleInterface */
    protected $module;

    protected $power;

    public function __construct()
    {
        $this->power = new Power( 999, 100 );
        //        $this->module = $module;
    }

    public function attack( Monster $monster )
    {
        if ( $this->power instanceof Power ) {
            /** @var Power $power */
            $power = $this->power;
            echo sprintf("超人能力:%d,范围:%d\n",$power->getAbility(),$power->getRange());
        }
    }

    public function magic()
    {
        $this->module->activate( [ ] );
    }

}