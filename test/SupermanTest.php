<?php

class SupermanTest extends PHPUnit_Framework_TestCase {

    public function test_new_superman_with_modules()
    {
        // 创建超人
        $superman = new Superman( [
                                      'Fight' => [ 9, 100 ],
                                      'Shot'  => [ 99, 50, 2 ],
                                  ] );
    }
}
