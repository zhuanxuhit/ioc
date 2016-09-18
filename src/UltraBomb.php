<?php

/**
 * 终极炸弹 （就这么俗）
 */
class UltraBomb implements SuperModuleInterface
{
    public function activate(Monster $target)
    {
        // 这只是个例子。。具体自行脑补
        echo "终极炸弹攻击怪物{$target->getName()}\n";
    }
}