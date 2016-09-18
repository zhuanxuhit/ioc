title: IoC
speaker: 颛顼
url: https://github.com/ksky521/nodePPT
transition: slide3
theme: moon



[slide]

# Inversion Of Control

[slide]

## 你是否被这些问题困扰过

[slide]

## parameter validation

```php
function A($arrInput) {
  // parameter validation
  if($user_id <= 0 || $props_id <= 0 || ( $props_id != 1050001 && $props_id != 1050002 ) )	{
            Bingo_Log::warning("input params invalid. [".serialize($arrInput)."]");
            return self::fail(Tieba_Errcode::ERR_PARAM_ERROR);
  }
  // something
  // call funciton B 
}
function B($arrInput) {
	// parameter validation again!!!!
}

```

[slide]

## dependence

```php

```

[slide]

## global variable everywhere

```php
function A() {
  $db = Service_Libs_Db::getDB()
  // do something, and call function B
  B()  
}
function B() {
  // also get db
  $db = Service_Libs_Db::getDB()
}
```

[slide]

# boring work everyday

## 让人狂躁的掀桌

[slide]

# dependency injection

## implements inversion of control

[slide]

# 是什么东西

[slide]

# 一种设计模式

[slide]

# 解决了什么问题

[slide]

# 不用关心怎么去new

# 只需要定义好我需要什么

[slide]

# 实践

## talk is cheap, show me the code

[slide]

```php
class Superman{}
```

[slide]

```php
class Power {
    /**
     * 能力值
     */
    protected $ability;
 
    /**
     * 能力范围或距离
     */
    protected $range;
 
    public function __construct($ability, $range)
    {
        $this->ability = $ability;
        $this->range = $range;
    }
}
```

[slide]

```php
class Superman
{
    protected $power;
 
    public function __construct()
    {
        $this->power = new Power(999, 100);
    }
}
```

[slide]

超人现在依赖于超能力

[slide]

需要更多的超能力

* 飞行，属性有：飞行速度、持续飞行时间
* 蛮力，属性有：力量值
* 能量弹，属性有：伤害值、射击距离、同时射击个数

[slide]

```php
class Flight
{
    protected $speed;
    protected $holdtime;
    public function __construct($speed, $holdtime) {}
}
 
class Force
{
    protected $force;
    public function __construct($force) {}
}
 
class Shot
{
    protected $atk;
    protected $range;
    protected $limit;
    public function __construct($atk, $range, $limit) {}
}
```

[slide]

```php
class Superman
{
    protected $power;
 
    public function __construct()
    {
        $this->power = new Fight(9, 100);
        // $this->power = new Force(45);
        // $this->power = new Shot(99, 50, 2);
        /*
        $this->power = array(
            new Force(45),
            new Shot(99, 50, 2)
        );
        */
    }
}
```

[slide]

超人有点忙了！

**改变超能力的同时，我还得重新制造个超人**

[slide]

## 工厂模式，依赖转移

```php
class SuperModuleFactory
{
    public function makeModule($moduleName, $options)
    {
        switch ($moduleName) {
            case 'Fight':   return new Fight($options[0], $options[1]);
            case 'Force':   return new Force($options[0]);
            case 'Shot':    return new Shot($options[0], $options[1], $options[2]);
        }
    }
}
class Superman
{
    protected $power;
 
    public function __construct()
    {
        // 初始化工厂
        $factory = new SuperModuleFactory;
 
        // 通过工厂提供的方法制造需要的模块
        $this->power = $factory->makeModule('Fight', [9, 100]);
    }
}
```



# 开源方案





