<?php
    $filename = 'data.dat';        
    header('Content-type: text/html; charset=utf-8');
    if(!file_exists($filename)) {
        die($filename . ' 数据文件不存在');
    }
    $data = file_get_contents($filename);
    $data = explode(PHP_EOL, $data);
    $result = $data[array_rand($data)];
    $result = str_replace(array("\r","\n","\r\n"), '', $result);
echo 'document.write("'.htmlspecialchars($result).'");';
		?>