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

[slide]



* 将原来创建工作转移到了SuperModuleFactory
* Superman只依赖于SuperModuleFactory

[slide]

```php
class Superman
{
    protected $power;
 
    public function __construct(array $modules)
    {
        // 初始化工厂
        $factory = new SuperModuleFactory;
 
        // 通过工厂提供的方法制造需要的模块
        foreach ($modules as $moduleName => $moduleOptions) {
            $this->power[] = $factory->makeModule($moduleName, $moduleOptions);
        }
    }
}
 
// 创建超人
$superman = new Superman([
    'Fight' => [9, 100], 
    'Shot' => [99, 50, 2]
    ]);
```

[slide]

工厂模式缺点



* 如果有新的、高级的模组加入，我们必须修改工厂类
* 不符合OCP原则

[slide]

申明契约

```php
interface SuperModuleInterface
{
    /**
     * 超能力激活方法
     *
     * 任何一个超能力都得有该方法，并拥有一个参数
     *@param array $target 针对目标，可以是一个或多个，自己或他人
     */
    public function activate(array $target);
}
class Superman
{
    protected $module;
 
    public function __construct(SuperModuleInterface $module)
    {
        $this->module = $module
    }
}
```

[slide]

上面就是：**依赖注入**！

依赖内部产生  —> 外部注入

```php
$superModule = new XPower;
 
$superMan = new Superman($superModule);
```

手动创建，手动注入，自动化

[slide]

```php
class Container
{
    protected $binds;
 
    protected $instances;
 
    public function bind($abstract, $concrete)
    {
        if ($concrete instanceof Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }
 
    public function make($abstract, $parameters = [])
    {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }
 
        array_unshift($parameters, $this);
 
        return call_user_func_array($this->binds[$abstract], $parameters);
    }
}
```



[slide]

```php
// 创建一个容器（后面称作超级工厂）
$container = new Container;
 
// 向该 超级工厂 添加 超人 的生产脚本
$container->bind('superman', function($container, $moduleName) {
    return new Superman($container->make($moduleName));
});
 
// 向该 超级工厂 添加 超能力模组 的生产脚本
$container->bind('xpower', function($container) {
    return new XPower;
});
 
// 同上
$container->bind('ultrabomb', function($container) {
    return new UltraBomb;
});
 
// ******************  华丽丽的分割线  **********************
// 开始启动生产
$superman_1 = $container->make('superman', ['xpower']);
$superman_2 = $container->make('superman', ['ultrabomb']);
$superman_3 = $container->make('superman', ['xpower']);
```

[slide]



[slide]

[slide]

# 开源方案





