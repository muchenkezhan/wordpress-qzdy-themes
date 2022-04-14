<?php
/**
 * php获取网站favicon图标
 * 版本：v1.0
 * 编写：沈唁志
 * 时间：2018/3/8
 */

header('Content-type: image/x-icon');   //输出的是图标格式
include_once("fav_function.php");

$dir = 'cache'; //图标缓存目录

//如果缓存目录不存在则创建
if (!is_dir($dir)) mkdir($dir,0777,true) or die('创建缓存目录失败！');

$url = getParam('url'); //获取传过来的链接参数

//没有url参数，输出默认图像
if(!$url) echoFav();

$http = '';

//如果网页不是http://开头的，就给他加上 
if(substr($url, 0, 4) != 'http')
{
    $url = 'http://'.$url;
}
else if(substr($url, 0, 5) == 'https')
{
    $http = 'https://'; //如果是https头，传到后面取图标时加上。防止出现302重定向
}


//非法域名时调用默认文件
if(isUrl($url) != '1') echoFav();

$arr = parse_url($url); //分解目标域名
$domain = $arr['host']; //没有头和尾的裸域名

$fav = $dir."/".$domain.".ico"; //图标保存的路径和名称

//调用缓存文件
if (file_exists($fav)) //有缓存就直接输出缓存
{
    $file = file_get_contents($fav);
    if($file) die($file);
}

//直接尝试站点根目录下的favion.ico文件  (通用方法)
getFav($http.$domain."/favicon.ico", $fav); 

//直接请求目标网址并匹配<meta>标签中的favion.ico
$curl = get_url_content($url);
$file = $curl['exec'];
preg_match('|href\s*=\s*[\"\']([^<>]*?)\.ico[\"\'\?]|i',$file,$a);    //正则匹配

//没有匹配结果
if(!(isset($a[1]) && $a[1]))
{
    getFav('http://cdn.website.h.qhimg.com/index.php?domain='.$domain, $fav);  //来自360的api
    echoFav($fav);
}

$a[1] .='.ico'; //加上后缀名
getFav($a[1], $fav);    //如果favicon自身带有完整链接

if(substr($a[1], 0, 1) == '/')  //相对路径的处理
{
    $a[1] = substr($a[1], 1);
}
if(substr($a[1], 0, 3) == '../')  //相对路径的处理
{
    $a[1] = substr($a[1], 3);
}
if(substr($a[1], 0, 2) == './')  //相对路径的处理
{
    $a[1] = substr($a[1], 2);
}

$u = $http.$domain.'/'.$a[1];   //手动加上链接再试一次
getFav($u, $fav);

//上面的方法都没法获取
getFav('http://cdn.website.h.qhimg.com/index.php?domain='.$domain, $fav);  //来自360的api
echoFav($fav);
?> 