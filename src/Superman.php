<?php

class Superman {

    protected $power;

    public function __construct()
    {
        // 初始化工厂
        $factory = new SuperModuleFactory;

        // 通过工厂提供的方法制造需要的模块
        $this->power = $factory->makeModule('Fight', [9, 100]);
        // $this->power = $factory->makeModule('Force', [45]);
        // $this->power = $factory->makeModule('Shot', [99, 50, 2]);
        /*
        $this->power = array(
            $factory->makeModule('Force', [45]),
            $factory->makeModule('Shot', [99, 50, 2])
        );
        */
    }
}