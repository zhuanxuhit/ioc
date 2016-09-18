<?php

class SuperModuleFactory {

    public function makeModule($moduleName, $options)
    {
        switch ($moduleName) {
            case 'Fight':   return new Flight($options[0], $options[1]);
            case 'Force':   return new Force($options[0]);
            case 'Shot':    return new Shot($options[0], $options[1], $options[2]);
        }
    }
}