<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Page</title>
</head>
<body>
    <h1>FirstPage</h1>
    <?php
    echo "Hello World";
    ?>
    <?php
    //phpinfo();//输出php版本信息
    $Int = 10;//定义int型变量 不分大小写
    echo "$Int";//输出变量
    //单双引号的使用区别
    $int = 11;
    echo "双引号输出$int";//双引号输出11
    echo '单引号输出$int';//单引号输出$int
    ?>
    <p>this is my house</p>
    <?php echo "some text" ?>
    <p>this is my house</p>
    <?php
        // $name = $_POST["userName"];
        // $pwd = $_POST["passWord"];
        // echo "欢迎你，$name!!!";

        //获取字符串长度
        $someString = "long String";
        //echo strlen($someString);//11
        //获取字符串单词数
        //echo str_word_count($someString);//10
        echo str_replace("long","new ",$someString);
    ?>
    <?php
        // $arrayName = array("red","blue","green");
        // foreach($arrayName as $value){
        //     echo "$value <br>";
        // }
        //多维数组
        $people = array
        (
            array("peter",12),
            array("mike",14)
        );
        print_r($people);
        $x = 3;
        $y = 5;
        function add(){
            $GLOBALS["z"] = $GLOBALS["x"] + $GLOBALS["y"];
            
        }
        add();
        echo $z;//8  可以从函数外部访问z

        echo $_SERVER["PHP_SELF"];//路径
        //echo $_SERVER["HTTP_HOST"];主机名
        //echo htmlspecialchars($_SERVER["PHP_SELF"]);
        $email = "@";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            echo $emailErr;
        }else{
            echo $email;
        }

        echo "Toady is " . date("Y/m/d");//输出年月日
        echo "Toady is " . date("l") . "<br>";//输出年月日
        echo "当前时区是" . date_default_timezone_get();//Asia/Sshanghai
        $creatTime = mktime(10,26,54,10,26,2089);
        echo "创建一个时间：" . date("Y/m/d h,:i:sa",$creatTime);//2089/10/26 10,:26:54am
        $file = fopen("text.txt","r") or die("无法打开");
        echo fread($file,filesize("text.txt"));
        fclose($file);//关闭文件
        echo readfile("text.txt");//读取文件并写入缓冲区
    ?>
    <?php
        $nameErr = $passwordErr = "";
        if(empty($_POST["name"])){
            $nameErr = "姓名为必填项";
            echo $nameErr;
        }else{
            $name = $_POST["name"];
            echo "欢迎！$name";
        }
    ?>
    
    <?php
    //上传图片
    //创建保存图片的文件
    //$imgfile = fopen("imgFile.","w") or die("Error");
    // if(!is_dir("us")){
    //     $imgfile = mkdir("imgFile");
    // }
    // $target_dir = "imgFile/";//指定放置文件的目录
    // $target_file = $target_dir . basename($_FILES["apicture"],["name"]);//指定上传文件的路径
    // $uploadOk = 1;
    // $imgfileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // if(isset($_POST["submit"])){
    //     $check = getimagesize($_FILES["apicture"],"imgFile");
    //     if($check !== false){
    //         echo "File is an image - " . $check["mime"] . ".";
    //     }else{
    //         echo "File is not an image.";
    //         $uploadOk = 0;
    //     }
    // }
    // //检查文件是否已经存在
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }
    // if ($uploadOk == 0) {
    //     echo "Sorry, your file was not uploaded.";
    //   // if everything is ok, try to upload file
    //   } else {
    //     if (move_uploaded_file($_FILES["fileToUpload"]["imgFile"], $target_file)) {
    //       echo "The file ". htmlspecialchars( basename( $_FILES["apicture"]["name"])). " has been uploaded.";
    //     } else {
    //       echo "Sorry, there was an error uploading your file.";
    //     }
    //   }
    ?>
    <?php
    //创建cookie
    $name = "user";
    $value = "tom";
    setcookie($name,$value,time()+3600);
    echo "当前cookie是" . $_COOKIE[$name];
    //检测是否设置cookie
    if(!isset($_COOKIE["user"])){
        echo "当前没有设置Cookie";
    }else{
        echo "已有Cookie" . $user . "!";
    }
    //删除cookie就是让过期时间小于现在的时间
    setcookie($name,$value,time()-4800);
    //再次检测
    if(!isset($_COOKIE["user"])){
        echo "当前没有设置Cookie";
    }else{
        echo "已有Cookie" . $user . "!";
    }
    ?>
    <?php
    session_start();
    $_SESSION["color"] = "green";
    $_SESSION["food"] = "fish";
    echo "this Session is " . $_SESSION["color"];
    ?>
    <?php
        $someStr = "<p> Hello World </p>";
        filter_var($someStr,FILTER_SANITIZE_STRING);//第二个参数代表要执行的操作
        echo $someStr;//Hello World 去除了html标记
        $num = 100;
        if(filter_var($num,FILTER_VALIDATE_INT)){
            echo "是整数";
        }else{
            echo "不是整数";//验证变量是不是整数
        }
        //如果变量值为0，将返回不是整数  解决这个问题
        $num = 0;
        if(filter_var($num,FILTER_VALIDATE_INT) === 0 || filter_var($num,FILTER_VALIDATE_INT) === true){
            echo "是整数";//是整数
        }else{
            echo "不是整数";
        }
        //验证IP地址是否有效
        $ip = "not ip";
        if(filter_var($ip, FILTER_VALIDATE_IP)){
            echo "有效";
        }else{
            echo "无效";
        }
        //清理和验证邮箱地址
        $email = "14797209@qq.com\\";
        echo filter_var($email,FILTER_SANITIZE_EMAIL);
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "yes";
        }else{
            echo "no";
        }
        //清理和验证url
        $url = "http://baidu.com";
        filter_var($url,FILTER_SANITIZE_URL);
        echo $url;
        if(filter_var($url,FILTER_VALIDATE_URL)){
            echo "yes";
        }else{
            echo "no";
        }
        //验证范围内的整数
        $num1 = 1;
        $num2 = 100;
        $num3 = 566;
        if(filter_var($num3,FILTER_VALIDATE_INT)){
            if($num3>$num1 && $num3 < $num2){
                echo $num3 . "是一个整数并且在1-100之间";
            }else{
                echo $num3 . "是一个整数但是不在1-100之间";
            }
        }else{
            echo $num3 . "不是一个整数";
        }
        //验证IPV6地址
        $ipv6 = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";
        if(filter_var($ipv6,FILTER_VALIDATE_IP,FILTER_FLAG_IPV6)){
            echo "ipv6";
        }else{
            echo "not ipv6";
        }
        if(filter_var($ipv6,FILTER_VALIDATE_IP)){
            if(filter_var($ipv6,FILTER_FLAG_IPV6)){
                echo "ipv6";
            }else{
                echo "not ipv6";
            }
        }//不行
        if(filter_var($ipv6,FILTER_FLAG_IPV6)){
            echo "ipv6";
        }else{
            echo "not ipv6";
        }//不行
    ?>
    <?php
        //回调函数
        function callBack($items){
            return strlen($items);
        }
        $strings = [1,3,45,2232,5];
        $string = array_map("callBack",$strings);
        print_r($string);
    ?>
    <?php
        //关联数组编码为JSON格式 json_ecode()
        $cpu = array("a"=>23,"b"=>21,"c"=>10,"d"=>19);
        echo json_encode($cpu);//{"a":23,"b":21,"c":10,"d":19}
        //索引数组编码为JSON格式
        $cpu = array("a","b","c","d");
        echo json_encode($cpu);//["a","b","c","d"]
        //将JSON对象解码为PHP对象或关联数组。json_decode() 有第二个参数，为true表示解码为关联数组
        $jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
        var_dump(json_decode($jsonobj));//{ ["Peter"]=> int(35) ["Ben"]=> int(37) ["Joe"]=> int(43) }php对象
        echo "分割线";
        var_dump(json_decode($jsonobj),true);//(3) { ["Peter"]=> int(35) ["Ben"]=> int(37) ["Joe"]=> int(43) } bool(true)
        //访问PHP对象解码的值
        $obj = json_decode($jsonobj);
        echo $obj->Peter;//35
        //访问关联数组解码的值
        $obj2 = json_decode($jsonobj,true);
        echo $obj2["Peter"];//35
        //循环遍历
        foreach($obj as $key=>$value){
            echo $key . "=" . $value . "<br>";
        }
    ?>
    <?php
        //抛出异常不捕获
        function divice($diveceNum){
            try{
                if($diveceNum == 0){
                    throw new Exception("param is 0");//不捕获
                }else{
                    return $diveceNum;
                }
                }catch(Exception $e){
                    echo "param is 0";
                    echo $e->getline();//265
            }finally{
                echo "function is complete";
            }
        }
        divice(0);//显示异常信息param is 0，进程继续进行
    ?>
    <?php
        $array = array("tw","us","ch");
        echo count($array);//3 获取数组长度
        echo strlen($array[1]);// 2 获取字符串长度
        echo "<br>" ;
        //循环遍历数值数组
        for($i = 0;$i<count($array);$i++){
            echo $array[$i];
            echo "<br>";
        }
        //循环遍历关联数组
        $arrayName = array("color1"=>"green","color2"=>"red","color3"=>"blue");
        sort($array);
        foreach($arrayName as $x=>$x_value){
            echo "keys=" . $x . "||" . "values="  . $x_value;
            echo "<br>";
        }
        // foreach($arrayName as $x_value){
        //     echo "values="  . $x_value . "<br>";
        // }
        echo $_SERVER["PHP_SELF"];//当前执行脚本的文件名
        echo $_SERVER["SERVER_ADDR"];//服务器IP地址
        echo $_SERVER["SERVER_NAME"];//服务器主机名
        echo "<br>";
        $name = $_REQUEST['userName'];//收集表单提交的数据
        echo $name;
        echo "<br>";
        $pwd = $_POST["passWord"];
        echo $pwd;
    ?>
</body>
</html>