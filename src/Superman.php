<?php

class Superman {

    /** @var \SuperModuleInterface */
    protected $module;

    protected $power;


    public function __construct(SuperModuleInterface $module)
    {
//        // 初始化工厂
//        $factory = new SuperModuleFactory;
//
//        // 通过工厂提供的方法制造需要的模块
//        foreach ($modules as $moduleName => $moduleOptions) {
//            $this->power[] = $factory->makeModule($moduleName, $moduleOptions);
//        }
        $this->module = $module;
    }

    public function attack( Monster $monster )
    {
        $powers = $this->power;
        foreach ($powers as $power){
            if ( $power instanceof Power ) {
                /** @var Power $power */
//                $power = $power;
                echo sprintf("超人能力:%d,范围:%d\n",$power->getAbility(),$power->getRange());
            }
            else if ($power instanceof Flight){
                /** @var Flight $flight */
                $flight = $power;
                echo sprintf("飞行速度:%d,持续飞行时间:%d\n",$flight->getSpeed(),$flight->getHoldtime());
            }
            else if ($power instanceof Force){
                /** @var Force $force */
                $force = $power;
                echo sprintf("力量值:%d\n",$force->getForce());
            }
            else {

            }
        }


    }

    public function magic($monster)
    {
        $this->module->activate( $monster );
    }

}