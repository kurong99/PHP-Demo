<?php
// class classname{
//     function construct(){
//         echo __METHOD__,"\n";
//     }
//     function funcName(){
//         echo __FUNCTION__,"\n";
//     }
// }
//     $a = new classname();
//     // $c = "funcName";
//     // $c();

//面向对象
//创建类
class stie{
    function setUrl($par){
        $this->url = $par;
    }
    function settitle($tit){
        $this->title = $tit;
    }
    function geturl(){
        echo $this->url;
        echo "<br>";
    }
    function gettitle(){
        echo $this->title;
        echo "<br>";
    }
}
//实例化
$baidu = new stie;
$google = new stie;

$baidu->settitle("百度");
$baidu->seturl("www.baidu.com");
$baidu->gettitle();
$baidu->geturl();

$google->settitle("谷歌");
$google->seturl("www.google.com");
$google->gettitle();
$google->geturl();

//构造函数  __consruct()  前面两个下划线
class car{

    var $name;
    var $price;
    function __construct($par1,$par2){
        $this->name = $par1;
        $this->price = $par2;
    }
    function getName(){
        echo "车的名字：" . $this->name;
        echo "<br>";
    }
    function getPrice(){
        echo "车的价格：" . $this->price;
        echo "<br>";
    }

}
$bmw = new car("宝马","2000000");
$bmw->getName();
$bmw->getPrice();

//析构函数  销毁对象
class destory{

    var $bad;
    function __construct($param){
        $this->fun = $param;
    }
    function __destruct(){
        echo "销毁" . $this->fun;
        echo "<br>";  
    }
}
//$des = new destory("jam");

//继承
class byd extends car{
    var $color;
    var $series;
    function __construct($color,$series){
        parent::__construct("byd","2000000");
        $this->color = $color;
        $this->series = $series;
    }
    function getcolor(){
        echo "车的颜色" . $this->color;
        echo "<br>";
    }
    function getseries(){
        echo "车的系列" . $this->series;
        echo "<br>";
    }
}
$byds = new byd("red","比亚迪宋");
$byds->getName();
$byds->getPrice();//来自父类的属性;
$byds->getcolor();
$byds->getseries();

//重载
class methodtest{
   public function __call($name, $arguments){
    echo "Call object methed '$name'" . implode(",",$arguments);
    echo "<br>";
   } 
   public static function __callStatic($name, $arguments)
   {
    echo "Call static object methed '$name'" . implode(",",$arguments);
    echo "<br>";
   }
}
$obj = new methodtest;
$obj->anMethed("in onject context");
methodtest::anMethed("in static context");//静态上下文调用

//访问控制
class test{
    const conset_value = "a constent value";
    public function testMethod(){
        $this->testPublic();
        $this->testPrivate();
    }
    public function testPublic(){
        echo "test public method";
        echo "<br>";
    }
    private function testPrivate(){
        echo "test private method";
        echo "<br>";
    }
}
class test1 extends test{
    
    public function testPublic(){
        echo "test1 public method";
    }
    private function testPrivate(){
        echo "test1 private method";
    }
}
$foo = new test1;
$foo->testMethod();

class myclass{
    const const_value = "a constent value";
}
$classname = "myclass";
echo $classname::const_value;//对象访问
echo myclass::const_value;//类名访问

class son extends myclass{
    public static $a = "static var";
    public static function b(){
        echo parent::const_value;
        echo self::const_value;
        echo "<br>";
    }
}
$classname = "son";
$classname::b();//对象访问
son::b();//子类名访问

//子类方法覆盖父类其中的方法时，php不会调用父类中已经被覆盖的方法  是否调用取决于子类
class _parent{
    protected function myfunc(){
        echo "父类方法";
        echo "<br>";
    }
}
class _son extends _parent{
    public function myfunc(){
        parent::myfunc();//调用父类方法
        echo "子类方法";
        echo "<br>";
    }
}
$_sonobject =new _son;
$_sonobject->myfunc();

//static关键字
class myclass1{
    public static $param = "a value";
    // public static function myfun($param){
    //     echo $this->$param; 伪对象不能在静态方法使用
    // }
}
 echo myclass1::$param."\n";

 //抽象方法
 abstract class abstractClass{
    abstract public function abstractfunc();
    public function commonfunc(){
        echo "普通方法";
    }
 }
 class ConcreteClass extends abstractClass{
     public function abstractfunc(){
        echo "强制定义父类抽象方法";
     }
 }
$newclass = new ConcreteClass;
$newclass->commonfunc();
$newclass->abstractfunc();

abstract class abstractClass1{
    abstract public function abstractfunc1($value);
    public function commonfunc1(){
        echo "普通方法";
    }
}
class ConcreteClass1 extends abstractClass1{
    public function abstractfunc1($value,$value2 = "somebody",$value3 = "hhh"){
        return $value . "----" . $value2 . $value3;
    }
}
$newclass2 = new ConcreteClass1;
echo $newclass2->abstractfunc1("I' am");
?>