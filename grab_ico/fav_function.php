<?php

/**
 * 获取favion图标
 * @param $url 目标url
 * @param $path 保存路径
 */
function getFav($url, $path)
{
    $curl = get_url_content($url);
    $file = $curl['exec'];  //获取到的文件
    $zt = $curl['getinfo']; //状态
    
    if($file && $zt['http_code'] == '200')    //有文件，并且返回状态为200
    {
        if(md5($file) == '4d8504e8ead22878dc1278750d874663')    //获取到的是来自360api的星星……
        {
            echoFav($path);
        }
        
        if($zt['content_type']=='image/x-icon') //是一个合法的图片文件
        {
            echoFav($path, $file);  //直接输出
        }
        else if($zt['content_type']=='image/vnd.microsoft.icon') //维基百科是这个类型
        {
            echoFav($path, $file);  //直接输出
        }
    }
}

/**
 * 输出最终的favion图标
 * @param $path 图标保存路径
 * @param $file 图标文件
 */
function echoFav($path = '', $file = '')
{
    if($file == ''){
        $file = "null.ico"; //默认的图标
        if (file_exists($file))  $file = file_get_contents($file);
        die($file);
    }
    if($path != ''){
            file_put_contents($path, $file);//保存文件
    }
    die($file);
}

/**
 * 获取GET或POST过来的参数
 * @param $key 键值
 * @param $default 默认值
 * @return 获取到的内容（没有则为默认值）
 */
function getParam($key,$default='')
{
    return trim($key && is_string($key) ? (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $default)) : $default);
}

/**
 * curl获取数据
 * @param $bbb 目标url地址
 * @return ['exec'] 获取的内容
 * @return ['getinfo'] 返回的状态码
 */
function get_url_content($bbb) { 
   $ch = curl_init(); 
   $timeout = 5000;  //超时时间
   curl_setopt ($ch, CURLOPT_URL, $bbb); 
   curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);  
   curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT_MS, $timeout); 
   curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
   curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
   curl_setopt ($ch, CURLOPT_ENCODING, 'gzip'); //取消gzip压缩(代表：网易邮箱)
   $file_info['exec']= curl_exec($ch); 
   $file_info['getinfo'] = curl_getinfo($ch); //判断状态 有的情况下无法正确判断ico是否存在
   curl_close($ch); 
   return $file_info; 
}

/**
 * 判断字符串是否为域名
 * @param $s 目标url地址
 * @return 
 */
function isUrl($s)  
{  
    return preg_match('/^http[s]?:\/\/'.  
        '(([0-9]{1,3}\.){3}[0-9]{1,3}'. // IP形式的URL- 199.194.52.184  
        '|'. // 允许IP和DOMAIN（域名）  
        '([0-9a-z_!~*\'()-]+\.)*'. // 三级域验证- www.  
        '([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\.'. // 二级域验证  
        '[a-z]{2,6})'.  // 顶级域验证.com or .museum  
        '(:[0-9]{1,4})?'.  // 端口- :80  
        '((\/\?)|'.  // 如果含有文件对文件部分进行校验  
        '(\/[0-9a-zA-Z_!~\*\'\(\)\.;\?:@&=\+\$,%#-\/]*)?)$/',  
        $s) == 1;  
}

/**
 * 判断网址302重定向后的地址
 * @param $url 目标url地址
 * @param $vars post数据
 * @return 重定向的网址或 false
 */
function curl_post_302($url, $vars = '') {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL,  $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // 302 redirect
    if($vars != '')
        curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);   //post数据
    $data = curl_exec($ch);
    $Headers =  curl_getinfo($ch);
    curl_close($ch);
    if ($data != $Headers)
        return  $Headers["url"];
    else
        return false;
}
?>