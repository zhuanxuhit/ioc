<?php

class Superman
{
    /** @var \SuperModuleInterface  */
    protected $module;

    public function __construct(SuperModuleInterface $module)
    {
        $this->module = $module;
    }

    public function attack( Monster $monster)
    {

    }

    public function magic()
    {
        $this->module->activate([]);
    }

}