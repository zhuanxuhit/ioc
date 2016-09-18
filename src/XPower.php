<?php

/**
 * X-超能量
 */
class XPower implements SuperModuleInterface{


    public function activate(Monster $target)
    {
        echo "X-超能量攻击怪物{$target->getName()}\n";
        // 这只是个例子。。具体自行脑补
    }
}