<?php

class SupermanTest extends PHPUnit_Framework_TestCase {


    public function test_new_superman_with_power()
    {
        $this->expectOutputString("超人能力:999,范围:100\n");
        // 创建超人
        $superman = new Superman(
            [
                'Power' => [999,100]
            ]
        );
        $monster  = new Monster( "小红" );

        $superman->attack( $monster );
    }
}
