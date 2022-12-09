<?php
    namespace Foo\Bar;
    include "namespace.php";
    function Addcount(){
        $x = 5;
        echo "i = " . $x;
        echo "<br>";
    }
    Addcount();//非限定名称  此时调用的是当前文件下的Addcount();
    subnamespace\Addcount();//限定名称  此时调用的是namespace.php文件下的Addcount();
    \Foo\Bar\Addcount();//完全限定名称   此时调用的是当前文件下的Addcount();
?>